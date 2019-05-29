<?php namespace Kom\Tags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomTags extends Migration
{
    public function up()
    {
        Schema::create('kom_tags_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tag');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_tags_');
    }
}
