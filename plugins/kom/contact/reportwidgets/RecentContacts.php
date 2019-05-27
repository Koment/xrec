<?php namespace Kom\Contact;

use Backend\Classes\ReporWidgetBase;

class RecentContacts extends ReportWidgetBase {

  public function render() {

    return $this->makePartial('widget');
  }

  
}
