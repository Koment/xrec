<?php namespace Kom\Events;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {

      return [

        'Kom\Events\Components\ongoingEvents' => 'ongoingEvents'

      ];

    }

    public function registerSettings()
    {
    }
}
