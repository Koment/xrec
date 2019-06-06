<?php namespace Kom\Tags;

use System\Classes\PluginBase;

use Kom\Events\Models\Event as eventModel;
use Kom\Events\Controllers\Events as eventContr;

use Kom\Artists\Models\Artist as artistModel;
use Kom\Artists\Controllers\Artists as artistContr;

use Rainlab\Blog\Models\Post as postModel;
use Rainlab\Blog\Controllers\Posts as postContr;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
      return [

          'Kom\Tags\FormWidgets\MyTagList' => [

              'lable' => 'Tags list',
              'code' => 'mytaglist'

          ]

      ];
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
            $form->addFields([

              'tags'=>[
                'label' => 'Tag list',
                'span' => 'auto',
                'mode' => 'relation',
                'separator' => 'comma',
                'customTags' => true,
                'useKey' => false,
                'type' => 'mytaglist',
              ]

            ]);
        });

        artistModel::extend(function($model){
            $model->morphToMany['tags'] = ['Kom\Tags\Models\tag', 'name' => 'taggable'];
        });

        artistContr::extendFormFields(function($form, $model, $context){
            $form->addFields([

              'tags'=>[
                'label' => 'Tag list',
                'span' => 'auto',
                'mode' => 'relation',
                'separator' => 'comma',
                'customTags' => true,
                'useKey' => false,
                'type' => 'mytaglist',
              ]

            ]);
        });


        postModel::extend(function($model){
            $model->morphToMany['tags'] = ['Kom\Tags\Models\tag', 'name' => 'taggable'];
        });

        postContr::extendFormFields(function($form, $model, $context){
            $form->addFields([

              'tags'=>[
                'label' => 'Tag list',
                'span' => 'auto',
                'mode' => 'relation',
                'separator' => 'comma',
                'customTags' => true,
                'useKey' => false,
                'type' => 'mytaglist',
              ]

            ]);
        });
    }
}
