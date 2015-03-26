<?php namespace Micropoplar\Volunteer;

use Backend;
use System\Classes\PluginBase;

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

}
