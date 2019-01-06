<?php namespace Kom\Artists\FormWidgets;

use Backend\Classes\FormWidgetBase;

use Config;

use Kom\Artists\Models\Tag;




class TagBox extends FormWidgetBase

{

    public function widgetDetails(){

        return [

            'name' => 'TagBox',
            'description' => 'field to add tags'

        ];

    }



    public function render(){

      $this->prepearVars();

      return $this->makePartial('widget');

    }

    public function prepearVars()
    {
      $this->vars['id'] = $this->model->id;

      $this->vars['tags'] = Tag::all()->lists('tag', 'id');

      $this->vars['name'] = $this->formField->getName().'[]';

      if(!empty($this->getLoadValue())){

        $this->vars['selectedValues'] = $this->getLoadValue();

      } else {

        $this->vars['selectedValues'] = [];

      }


    }

    public function loadAssets(){

      $this->addCss('css\select2.css');
      $this->addJs('js\select2.js');

    }

}
