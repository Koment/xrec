<?php namespace Kom\Artists\Models;

use Model;

/**
 * Model
 */
class Artist extends Model
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
    public $table = 'kom_artists_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /* Relations */

    public $attachOne = [

      'poster' => 'System\Models\File'

    ];

    public $attachMany = [

      'tracks' => 'System\Models\File'

    ];
}
