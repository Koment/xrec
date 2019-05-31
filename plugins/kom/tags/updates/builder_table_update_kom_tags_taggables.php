<?php namespace Kom\Tags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomTagsTaggables extends Migration
{
    public function up()
    {
        Schema::rename('kom_tags_guid', 'kom_tags_taggables');
    }
    
    public function down()
    {
        Schema::rename('kom_tags_taggables', 'kom_tags_guid');
    }
}
