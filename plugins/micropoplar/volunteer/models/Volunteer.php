<?php namespace Micropoplar\Volunteer\Models;

use Model;

/**
 * Volunteer Model
 */
class Volunteer extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'micropoplar_volunteer_volunteers';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

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