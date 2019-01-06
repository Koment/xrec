<?php namespace Kom\Artists\Models;

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


    /**
     * @var string The database table used by the model.
     */
    public $table = 'kom_artists_tags';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    /* Relations */

    public $belongsToMany = [

      'artists' => [
        'Kom\Artists\Models\Artist',
        'table' => 'kom_artists_tags_pivot',
        'order' => 'name'

      ],

    ];


}
