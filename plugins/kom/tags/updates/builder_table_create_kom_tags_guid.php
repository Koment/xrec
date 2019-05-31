<?php namespace Kom\Tags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomTagsGuid extends Migration
{
    public function up()
    {
        Schema::create('kom_tags_guid', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('tag_id');
            $table->string('model_name');
            $table->integer('rec_id');
            $table->primary(['tag_id','model_name','rec_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_tags_guid');
    }
}
