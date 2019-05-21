<?php namespace Kom\Contact\Components;

use Cms\Classes\ComponentBase;

use Input;

use Mail;

use Validator;

use Redirect;

use Kom\Contact\Models\Contact;

use Carbon\Carbon;


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

        'uploads' => [

          'title' => 'upload form',
          'description' => 'добавить загрузку файлов в форму',
          'default' => 0,
          'validationPattern' => '^[0-1]$',
          'validationMessage' => 'Only true or false'

        ],

      ];

    }

    // |^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$

    public function onSend(){


      $validator = Validator::make(

        [

          'name' => Input::get('name'),
          'email' => Input::get('email'),
          'phone' => Input::get('phone'),
          'content' => Input::get('content'),

        ],

        [

          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'content' => 'required',
        ]

      );


        if ($validator -> fails()){

          return ['#result' => $this->renderPartial('contactform::messages',[

                  'errMsgs' => $validator->messages()->all(),

                  'fieldMsgs' => $validator->messages(),

                ])];

        } else {


            $message = new Contact();

            $message->name = Input::get('name');

            $message->email = Input::get('email');

            $message->phone = Input::get('phone');

            $message->description = Input::get('content');

            $message->created_at = Carbon::now();

            $message->save();


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
      $this->upload = $this->property('uploads');

    }

    public $title;
    public $upload;

}
