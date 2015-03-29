<?php namespace Micropoplar\Volunteer\Facades;

use October\Rain\Support\Facade;

class VolunteerAuth extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor() { return 'volunteer.auth'; }
}
