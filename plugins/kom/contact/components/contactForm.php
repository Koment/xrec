<?php namespace Kom\Contact\Components;

use Cms\Classes\ComponentBase;

use Input;

use Mail;

use Validator;

use Redirect;


class ContactForm extends ComponentBase
{


    public function componentDetails(){

      return[

        'name' => 'Contact form',
        'description' => 'Simple contct form'

      ];

    }

    public function defineProperties(){

      return [

        'subject' => [

            'title' => 'Mail subject',
            'description' => 'Define Mail subject',
            'default' => 'Контакты',
            'validationPattern' => '',
            'validationMessage' => 'Никаких спецсимволов'

        ],

        'adress' => [

          'title' => 'enter email',
          'description' => 'Кому слать письма!',
          'default' => 'x-records.ru@yandex.ru',
          'validationPattern' => '',
          'validationMessage' => 'Only numbers allowed!'

        ],

      ];

    }

    public function onSend(){


      $validator = Validator::make(

        [

          'name' => Input::get('name'),
          'email' => Input::get('email'),
          'content' => Input::get('content')

        ],

        [

          'name' => 'required',
          'email' => 'required|email',
          'content' => 'required',
        ]

      );


        if ($validator -> fails()){

          return ['#result' => $this->renderPartial('contactform::messages',[

                  'errMsgs' => $validator->messages()->all(),

                  'fieldMsgs' => $validator->messages(),

                ])];

        } else {

            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content'), 'subject' => $this->property('subject')];

            Mail::send('kom.contact::mail.message', $vars, function($message){

              $message -> to($this->property('adress'), 'Angry Admin');

              $message -> subject('new message from ' . $this->property('subject'));

            });

            return ['#result' => $this->renderPartial('contactform::messages',[

                  'errMsgs' => $validator->messages()->all(),
                  'success' => 'your messaga is send!',

              ])];

        }

    }

    public function onRun (){

      $this->title = $this->property('subject');
    }

    public $title;

}
