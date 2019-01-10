<?php namespace Kom\Artists\Components;


use Cms\Classes\ComponentBase;

use Kom\Artists\Models\Artist;

class randomArtists extends ComponentBase {

    public function componentDetails(){

        return [

          'name' => 'Random Artists',
          'description' => 'Displays random artists'

        ];
    }

    public function defineProperties(){

      return [

        'results' => [

            'title' => 'Random artists',
            'description' => 'How many artists to display',
            'default' => 3,
            'validationPattern' => '^[0-9]+$',
            'validationMessage' => 'Only numbers allowed!'

        ]

      ];


    }

    public function onRun(){

      $this->randomArtists = $this->loadArtists();

    }


    protected function loadArtists(){

      // dd(Artist);

      return Artist::whereIn('id', $this->randomIDs())->get();

    }

    protected function randomIDs(){

      $ids = [];

      $count = Artist::count();

      // if ($this->property('results') > $count) { $this->property('results') = $count; }

      while (count($ids) < (($this->property('results')>$count) ? $count : $this->property('results'))) {

        $tmp = rand(1, $count);

        if (!in_array($tmp, $ids)){

          $ids[] = $tmp;

        }

      }

      return $ids;

    }

    public $randomArtists;

}
