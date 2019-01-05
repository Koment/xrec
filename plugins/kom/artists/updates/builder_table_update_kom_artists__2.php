<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomArtists2 extends Migration
{
    public function up()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->dropColumn('genre');
        });
    }
    
    public function down()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->string('genre', 191)->nullable();
        });
    }
}
