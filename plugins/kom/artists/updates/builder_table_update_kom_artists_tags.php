<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomArtistsTags extends Migration
{
    public function up()
    {
        Schema::table('kom_artists_tags', function($table)
        {
            $table->string('tag')->change();
            $table->string('slug')->change();
        });
    }
    
    public function down()
    {
        Schema::table('kom_artists_tags', function($table)
        {
            $table->string('tag', 191)->change();
            $table->string('slug', 191)->change();
        });
    }
}
