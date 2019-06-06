<?php namespace Kom\Tags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomTags extends Migration
{
    public function up()
    {
        Schema::table('kom_tags_', function($table)
        {
            $table->string('slug', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('kom_tags_', function($table)
        {
            $table->string('slug', 191)->nullable(false)->change();
        });
    }
}
