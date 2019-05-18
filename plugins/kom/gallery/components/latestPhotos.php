<?php namespace Kom\Gallery\Components;

use Cms\Classes\ComponentBase;

use Kom\Gallery\Models\Gallery;

use System\Models\File;

class latestPhotos extends ComponentBase {

  public function ComponentDetails() {

    return [

        'name' => 'Random gallery photos',
        'description' => 'List of random gallery photos',

    ];
  }

  public function defineProperties(){

    return [

      'albums' => [

          'title' => 'Random albums',
          'description' => 'How many albums to display',
          'default' => 2,
          'validationPattern' => '^[0-9]+$',
          'validationMessage' => 'Only numbers allowed!'

      ],

      'photos' => [

        'title' => 'how many photos to display',
        'description' => 'how many photos to display descr',
        'default' => 2,
        'validationPattern' => '^[0-9]+$',
        'validationMessage' => 'Only numbers allowed!'

      ],

    ];

  }

  public function onRun () {

    // dd($this->getLatestPhotos ());

    $this->latestPhotos = $this->getLatestPhotos ();

  }

  protected function getLatestPhotos () {

    // return $latest = Gallery::whereIn('id', $this->randomIDs())->get();

    return $latest = Gallery::whereIn('id', $this->randomIDs())->get();

  }



  protected function randomIDs(){

    $ids = [];

    $count = Gallery::count();

    while (count($ids) < (($this->property('albums')>$count) ? $count : $this->property('albums'))) {

      $tmp = rand(1, $count);

      if (!in_array($tmp, $ids)){

        $ids[] = $tmp;

      }

    }

    return $ids;

  }

  public $latestPhotos;
}
