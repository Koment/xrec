<?php namespace Kom\Contact\ReportWidgets;

use Backend\Classes\ReportWidgetBase;

class RecentContacts extends ReportWidgetBase {

  public function render() {

    return $this->makePartial('widget');
  }

  // $recCon = new RecentContacts($this);
  // $recCon->alias = 'recentcontacts';
  // $recCon->bindToController();
}
