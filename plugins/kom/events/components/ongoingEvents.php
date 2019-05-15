<?php namespace Kom\Events\Components;

use Cms\Classes\ComponentBase;

use Kom\Events\Models\Event;

class ongoingEvents extends ComponentBase {

    public function ComponentDetails() {

      return [

          'name' => 'Ongoing events',
          'description' => 'List of ongoing events',

      ];
    }

    public function onRun () {

      $this->ongoingEvents = $this->getOngoingEvents();
    }

    protected function getOngoingEvents(){

      return Event::all();

    }

    public $ongoingEvents;

}
