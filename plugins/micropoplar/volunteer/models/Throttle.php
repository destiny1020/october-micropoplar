<?php namespace Micropoplar\Volunteer\Models;

use October\Rain\Auth\Models\Throttle as ThrottleBase;

class Throttle extends ThrottleBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'user_throttle';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => ['Micropoplar\Volunteer\Models\Volunteer']
    ];
}
