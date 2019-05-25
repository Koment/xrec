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

            if ($this->property('uploads') == 1 && Input::file('files')) {

                  $file = new File();
                  $file -> fromPost(Input::file('files'));

                  // dd($file);

                  if ($file->save()) {

                    $message->save();

                    // Attach the uploaded file to your model
                    $message->files()->add($file);
                    $message->save();

                    Flash::success('file saved!');

                    return Redirect::back();



                    // return ['#result' => $this->renderPartial('contactform::messages',[
                    //
                    //       // 'errMsgs' => $validator->messages()->all(),
                    //       'success' => '$file->path',
                    //
                    //       ])];

                  } else {

                    Flash::success('file NOT saved!');

                    //     dd($file);
                    // return ['#result' => $this->renderPartial('contactform::messages',[
                    //
                    //       // 'errMsgs' => $validator->messages()->all(),
                    //       'success' => $file->path,
                    //
                    //       ])];

                  }


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

            // return ['#result' => $this->renderPartial('contactform::messages',[
            //
            //       'errMsgs' => $validator->messages()->all(),
            //       'success' => 'your messaga is send!',
            //
            //   ])];

        }

    }

    public function onRun (){

      $this->title = $this->property('subject');
      $this->upload = $this->property('uploads');

    }

    public $title;
    public $upload;

}
