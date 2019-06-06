<?php namespace Kom\Tags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomTags2 extends Migration
{
    public function up()
    {
        Schema::table('kom_tags_', function($table)
        {
            $table->renameColumn('tag', 'name');
        });
    }
    
    public function down()
    {
        Schema::table('kom_tags_', function($table)
        {
            $table->renameColumn('name', 'tag');
        });
    }
}
