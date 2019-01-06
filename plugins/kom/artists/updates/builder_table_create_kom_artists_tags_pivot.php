<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomArtistsTagsPivot extends Migration
{
    public function up()
    {
        Schema::create('kom_artists_tags_pivot', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('artist_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['artist_id','tag_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_artists_tags_pivot');
    }
}
