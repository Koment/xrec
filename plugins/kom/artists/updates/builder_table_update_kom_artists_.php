<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomArtists extends Migration
{
    public function up()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
