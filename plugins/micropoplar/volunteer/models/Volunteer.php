<?php namespace Micropoplar\Volunteer\Models;

use URL;
use Mail;
use Micropoplar\Volunteer\Models\Settings as UserSettings;
use October\Rain\Auth\Models\User as UserBase;
/**
 * Volunteer Model
 */
class Volunteer extends UserBase
{

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'micropoplar_volunteer_volunteers';

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

    public function attemptActivation($code)
    {
        $result = parent::attemptActivation($code);
        if ($result === false) {
            return false;
        }

        if ($mailTemplate = UserSettings::get('welcome_template')) {
            $data = [
                'name' => $this->name,
                'email' => $this->email
            ];

            Mail::send($mailTemplate, $data, function($message) {
                $message->to($this->email, $this->name);
            });
        }

        return true;
    }

    public function getPersistCode()
    {
        if (!$this->persist_code)
            return parent::getPersistCode();

        return $this->persist_code;
    }

}