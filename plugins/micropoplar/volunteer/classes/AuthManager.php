<?php namespace Micropoplar\Volunteer\Classes;

use October\Rain\Auth\Manager as RainAuthManager;
use Micropoplar\Volunteer\Models\Settings as UserSettings;

class AuthManager extends RainAuthManager
{
    protected static $instance;

    protected $sessionKey = 'volunteer_auth';

    protected $userModel = 'Micropoplar\Volunteer\Models\Volunteer';

    // protected $groupModel = 'RainLab\User\Models\Group';

    protected $throttleModel = 'Micropoplar\Volunteer\Models\Throttle';

    public function init()
    {
        $this->useThrottle = UserSettings::get('use_throttle', $this->useThrottle);
        $this->requireActivation = UserSettings::get('require_activation', $this->requireActivation);
        parent::init();
    }
}