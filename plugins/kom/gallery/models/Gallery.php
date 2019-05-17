<?php namespace Kom\Gallery\Models;

use Model;

/**
 * Model
 */
class Gallery extends Model
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
    public $table = 'kom_gallery_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachMany = [

      'gal_photo' => 'System\Models\File',

    ];
}
