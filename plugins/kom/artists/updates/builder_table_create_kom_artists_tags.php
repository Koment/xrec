<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomArtistsTags extends Migration
{
    public function up()
    {
        Schema::create('kom_artists_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tag')->nullable();
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_artists_tags');
    }
}
