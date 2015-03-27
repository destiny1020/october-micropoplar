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

    // front-end will validate one by one
    public $rules = [
        'identity_number' => array(
            'required',
            'regex:/^\d{15}$|^\d{18}$/',
            'unique:micropoplar_volunteer_volunteers'
            ),
        'name' => 'required|between:8,20|unique:micropoplar_volunteer_volunteers',
        'email' => 'required|between:3,64|email|unique:micropoplar_volunteer_volunteers',
        'password' => 'required:create|between:4,64|confirmed',
        'password_confirmation' => 'required_with:password|between:4,64'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    protected $hashable = ['password'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'email',
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

}