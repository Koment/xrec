<?php namespace Kom\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {

      return[

          'Kom\Contact\Components\ContactForm' => 'contactform',

      ];

    }

    public function registerSettings()
    {
    }

    public function registerReportWidgets() {

      return [

        'Kom\Contact\ReportWidgets\RecentContacts' => [
          'label' => 'Последние Контакты',
          'context' => 'dashboard'
        ]
      ];
    }
}
