<?php namespace Kom\Contact\Components;

use Cms\Classes\ComponentBase;

use Input;

use Mail;

use Validator;

use Redirect;

use Kom\Contact\Models\Contact;

use System\Models\File;

use Carbon\Carbon;

use Flash;


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


    public function onSend(){

      $upfile;

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
          'phone' => 'required|regex:/^(?:\+?[7,8,])+?([ (])+(\d{3})+?([ )])+(\d{3})?[ -]+(\d{2})?[ -]+(\d{2})$/',
          'content' => 'required',

        ],

        [
          'phone.regex' => 'телефон в формате +7(8) (ххх) ххх-хх-хх',

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

            // $message->save();

            if ( $this->property('uploads') == 1 && Input::file('files')->getSize() > 0 ) {

              // Flash::error('input file size = ' . Input::file('files')->getSize());
              //
              // return ['#result' => $this->renderPartial('contactform::messages',[
              //
              //         'error' => 'input file size = ' . Input::file('files')->getSize(),
              //
              //       ])];

              $accepted = ['application/zip', 'application/x-rar'];

              if (in_array(Input::file('files')->getMimeType(), $accepted) ) {

                  $file = new File();

                  $file -> fromPost(Input::file('files'));

                  if ($file->save()) {

                    $message->save();

                    // Attach the uploaded file to your model
                    $message->files()->add($file);

                    $message->save();

                    Flash::success('Файлы отправлены!');

                    return Redirect::back();

                  } else {

                    return ['#result' => $this->renderPartial('contactform::messages',[

                            'error' => 'Файлы не отправлены, попробуйте ещё раз.'

                          ])];
                  }

                } else {

                  return ['#result' => $this->renderPartial('contactform::messages',[

                          'error' => 'Только zip или rar архив не более ' . ini_get('upload_max_filesize') . 'b',

                        ])];
                }

            } elseif ($this->property('uploads') == 0) {

              $message -> save();

              Flash::success('Мы обязательно прочтем!');

              return Redirect::back();

            } else {

              return ['#result' => $this->renderPartial('contactform::messages',[

                      'error' => 'Файлы не выбраны... или размер архива превышает ' . ini_get('upload_max_filesize') . 'b.'

                    ])];

            }


            // $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content'), 'subject' => $this->property('subject')];
            //
            // Mail::send('kom.contact::mail.message', $vars, function($message){
            //
            //   $message -> to($this->property('adress'), 'Angry Admin');
            //
            //   $message -> subject('new message from ' . $this->property('subject'));
            //
            // });

        }

    }

    public function onRun (){

      $this->title = $this->property('subject');
      $this->upload = $this->property('uploads');

    }

    public $title;
    public $upload;

}
