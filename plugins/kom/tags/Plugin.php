<?php namespace Kom\Tags;

use System\Classes\PluginBase;

use Kom\Events\Models\Event as eventModel;
use Kom\Events\Controllers\Events as eventContr;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        eventModel::extend(function($model){
            $model->morphToMany['tags'] = ['Kom\Tags\Models\tag', 'name' => 'taggable'];
        });

        // public $morphToMany = [
       //   'tags' => ['Kom\Tags\Models\tag', 'name' => 'taggable']
       // ];

        eventContr::extendFormFields(function($form, $model, $context){
            $form->addTabFields([

              'tags'=>[
                'label' => 'Tag list',
                'span' => 'auto',
                'mode' => 'relation',
                'separator' => 'comma',
                'customTags' => 'true',
                'useKey' => 'false',
                'type' => 'taglist',
              ]

            ]);
        });
    }
}
