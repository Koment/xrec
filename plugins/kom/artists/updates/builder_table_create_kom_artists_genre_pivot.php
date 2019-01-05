<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomArtistsGenrePivot extends Migration
{
    public function up()
    {
        Schema::create('kom_artists_genre_pivot', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('artist_id');
            $table->integer('genre_id');
            $table->primary(['artist_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_artists_genre_pivot');
    }
}
