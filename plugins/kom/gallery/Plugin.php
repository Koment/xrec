<?php namespace Kom\Gallery;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [

        'Kom\Gallery\Components\latestPhotos' => 'latestPhotos',
        
      ];
    }

    public function registerSettings()
    {
    }
}
