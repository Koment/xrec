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

            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

            Mail::send('kom.contact::mail.message', $vars, function($message){

              $message -> to('AngryAdmin@mail', 'Angry Admin');

              $message -> subject('new message from contact form');

            });

            return ['#result' => $this->renderPartial('contactform::messages',[

                  'errMsgs' => $validator->messages()->all()

              ])];

        }

    }


}
