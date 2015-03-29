<?php namespace Micropoplar\Volunteer;

use App;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader; 

/**
 * Volunteer Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'micropoplar.volunteer::lang.plugin.name',
            'description' => 'micropoplar.volunteer::lang.plugin.description',
            'author' => 'Micropoplar',
            'icon' => 'icon-leaf'
        ];
    }

    public function register()
    {
        $alias = AliasLoader::getInstance();
        $alias->alias('Auth', 'Micropoplar\Volunteer\Facades\VolunteerAuth');

        App::singleton('volunteer.auth', function() {
            return \Micropoplar\Volunteer\Classes\AuthManager::instance();
        });
    }

    public function registerComponents()
    {
        return [
            'Micropoplar\Volunteer\Components\VolunteerAccount' => 'volunteerAccount',
            'Micropoplar\Volunteer\Components\VolunteerSession' => 'volunteerSession'
        ];
    }

    public function registerPermissions()
    {
        return [
            'micropoplar.volunteers.access_volunteers'  => ['tab' => 'Volunteers', 'label' => 'Manage Volunteers'],
        ];
    }

    public function registerNavigation()
    {
        return [
            'volunteer' => [
                'label'       => 'micropoplar.volunteer::lang.volunteers.menu_label',
                'url'         => Backend::url('micropoplar/volunteer/volunteer'),
                'icon'        => 'icon-user',
                'permissions' => ['micropoplar.volunteers.*'],
                'order'       => 1000,

                'sideMenu' => [
                    'volunteers' => [
                        'label'       => 'micropoplar.volunteer::lang.volunteers.all_volunteers',
                        'icon'        => 'icon-user',
                        'url'         => Backend::url('micropoplar/volunteer/volunteer'),
                        'permissions' => ['micropoplar.volunteers.access_users']
                    ]
                ]
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'micropoplar.volunteer::settings.settings.menu_label',
                'description' => 'micropoplar.volunteer::settings.settings.menu_description',
                'category'    => 'micropoplar.volunteer::settings.settings.volunteers',
                'icon'        => 'icon-cog',
                'class'       => 'Micropoplar\Volunteer\Models\Settings',
                'order'       => 500
            ],
        ];
    }

}
