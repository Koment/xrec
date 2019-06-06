<?php namespace Kom\Tags\Models;

use Model;

/**
 * Model
 */
class Tag extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    // protected $fillable = [
    //     'name'
    // ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'kom_tags_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $morphedByMany = [

      'artists' => ['Kom\Artists\Models\Artist', 'name' => 'taggable', 'model' => 'artists'],
      'events' => ['Kom\Events\Models\Event', 'name' => 'taggable', 'model' => 'events'],
      'news' => ['Rainlab\Blog\Models\Post', 'name' => 'taggable', 'model' => 'news'],
    ];

    public function getRelationModel(){

      return 'getRelationModel()';
    }
}
