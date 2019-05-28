<?php namespace Kom\Contact\ReportWidgets;

use Backend\Classes\ReportWidgetBase;

use Kom\Contact\Models\Contact;

class RecentContacts extends ReportWidgetBase {

  public function defineProperties(){

    return [

      'count' => [
        'title' => 'Количество последних писем',
        'description' => 'Количество последних писем',
        'defailt' => 5,
        'validationPattern' => '^[1-9{1}]$',
        'validationMessage' => 'от 1 до 9 сообщений'
      ],

      'title' => [
        'title' => 'Заголовок',
        'description' => 'Изменить заголовок',
        'defailt' => 'Последние Контакты',
        'validationPattern' => '^.+$',
        'validationMessage' => 'от 1 до 9 сообщений'
      ]
    ];
  }

  protected function getMessages(){

    return Contact::orderBy('created_at', 'desc')->take($this->property('count'))->get();
  }

  public function render() {

    $this->vars['lastmess'] = $this->getMessages();

    return $this->makePartial('widget');
  }

}
