<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomArtistsGenre extends Migration
{
    public function up()
    {
        Schema::create('kom_artists_genre', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('genre');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_artists_genre');
    }
}
