<?php namespace Kom\Contact\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Kom\Contact\ReportWidgets\RecentContacts;

class Contacts extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Kom.Contact', 'main-menu-item');

        $recCon = new RecentContacts($this);
        $recCon->alias = 'recentcontacts';
        $recCon->bindToController();
    }
}
