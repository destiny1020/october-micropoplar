<?php namespace Micropoplar\Volunteer\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Volunteer Back-end Controller
 */
class Volunteer extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['micropoplar.volunteers.access_volunteers'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Micropoplar.Volunteer', 'volunteer', 'volunteers');
    }
}