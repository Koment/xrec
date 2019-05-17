<?php namespace Kom\Gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomGallery extends Migration
{
    public function up()
    {
        Schema::create('kom_gallery_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->date('date');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_gallery_');
    }
}
