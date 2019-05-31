<?php namespace Kom\Tags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomTagsGuid extends Migration
{
    public function up()
    {
        Schema::table('kom_tags_guid', function($table)
        {
            $table->dropPrimary(['tag_id','model_name','rec_id']);
            $table->string('taggable_type', 10);
            $table->renameColumn('rec_id', 'taggable_id');
            $table->dropColumn('model_name');
            $table->primary(['tag_id','taggable_id','taggable_type']);
        });
    }
    
    public function down()
    {
        Schema::table('kom_tags_guid', function($table)
        {
            $table->dropPrimary(['tag_id','taggable_id','taggable_type']);
            $table->dropColumn('taggable_type');
            $table->renameColumn('taggable_id', 'rec_id');
            $table->string('model_name', 191);
            $table->primary(['tag_id','model_name','rec_id']);
        });
    }
}
