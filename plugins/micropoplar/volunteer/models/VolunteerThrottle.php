<?php namespace Micropoplar\Volunteer\Models;

use October\Rain\Auth\Models\Throttle as ThrottleBase;

class VolunteerThrottle extends ThrottleBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'micropoplar_volunteer_volunteers_throttle';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'volunteer' => ['Micropoplar\Volunteer\Models\Volunteer']
    ];
}
