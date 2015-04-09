<?php namespace Micropoplar\Volunteer\Models;

use October\Rain\Database\Model;

/**
 * Volunteer Model
 */
class Volunteer extends Model
{

    use \October\Rain\Database\Traits\Hashable;
    use \October\Rain\Database\Traits\Purgeable;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'micropoplar_volunteer_volunteers';

    public $rules = [
        'identity_number' => array(
            'required',
            'regex:/^\d{15}$|^\d{18}$/',
            'unique:micropoplar_volunteer_volunteers'
            ),
        'email' => 'required|between:3,64|email|unique:micropoplar_volunteer_volunteers',
        'phone' => array(
            'required',
            'regex:/^\d{11}$/',
            'unique:micropoplar_volunteer_volunteers'
            ),
        'realname' => 'required|between:2,20',
        'nickname' => 'required|between:6,20|unique:micropoplar_volunteer_volunteers',
        'password' => 'required:create|between:4,64|confirmed',
        'password_confirmation' => 'required_with:password|between:4,64'
    ];

    protected $hidden = ['password', 'reset_password_code', 'activation_code', 'persist_code'];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['reset_password_code', 'activation_code', 'persist_code'];

    protected $hashable = ['password'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'realname',
        'nickname',
        'email',
        'phone',
        'identity_number',
        'password',
        'password_confirmation'
    ];

    protected $purgeable = ['password_confirmation'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getActivationCode()
    {
        $this->activation_code = $activationCode = $this->getRandomString();

        // TODO: get meaning
        $this->forceSave();

        return $activationCode;
    }

    public function attemptActivation($activationCode)
    {
        if($this->is_activated)
            throw new Exception('Volunteer is already active!');

        if($activationCode == $this->activation_code) {
            $this->activation_code = null;
            $this->is_activated = true;
            $this->activated_at = $this->freshTimestamp();

            // TODO: get meaning
            $this->forceSave();
            return true;
        }

        return false;
    }

    public function getPersistCode()
    {
        if(!$this->persist_code) {
            $persistCode = $this->persist_code = $this->getRandomString();
            $this->forceSave();
            return $persistCode;
        }

        return $this->persist_code;
    }

    public function checkPersistCode($persistCode)
    {
        if (!$persistCode)
            return false;

        return $persistCode == $this->persist_code;
    }

    /**
     * Generate a random string
     * @return string
     */
    public function getRandomString($length = 42)
    {
        /*
         * Use OpenSSL (if available)
         */
        if (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes($length * 2);

            if ($bytes === false)
                throw new RuntimeException('Unable to generate a random string');

            return substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $length);
        }

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    //
    // Events
    //

    public function afterLogin()
    {
        $this->last_login = $this->freshTimestamp();
        $this->forceSave();
    }

}