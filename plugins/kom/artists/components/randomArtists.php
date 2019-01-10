<?php namespace Kom\Artists\Components;


use Cms\Classes\ComponentBase;

use Kom\Artists\Models\Artist;

class randomArtists extends ComponentBase {

    public function componentDetails(){

        return [

          'name' => 'Random Artists',
          'description' => 'Discpays random artists'

        ];


    }

    public function onRun(){

      $this->randomArtists = $this->loadArtists();

    }


    protected function loadArtists(){

      return Artist::all();

    }

    public $randomArtists;

}
