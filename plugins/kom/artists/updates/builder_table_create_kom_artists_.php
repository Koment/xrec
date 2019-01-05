<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomArtists extends Migration
{
    public function up()
    {
        Schema::create('kom_artists_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('genre')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_artists_');
    }
}
