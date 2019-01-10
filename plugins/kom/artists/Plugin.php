<?php namespace Kom\Artists;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {

        return [

          'Kom\Artists\Components\randomArtists' => 'randomArtists'

        ];

    }

    public function registerFormWidgets()
    {
      return [

          'Kom\Artists\FormWidgets\TagBox' => [

              'lable' => 'Tags field',
              'code' => 'tagbox'

          ]

      ];
    }

    public function registerSettings()
    {
    }
}
