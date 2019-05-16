<?php namespace Kom\Events\Components;

use Cms\Classes\ComponentBase;

use Kom\Events\Models\Event;

use Carbon\Carbon;

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

      $now = Carbon::now();

      $ongoing = Event::all()->where('event_date', '>', $now);

      if (count($ongoing) > 0) {

        for ($i = 0; $i < count($ongoing); $i++){

          $ongoing[$i]->attributes['event_date'] = explode(' ', $ongoing[$i]->attributes['event_date']);
        }

        return $ongoing;

      }

    }

    public $ongoingEvents;

}
