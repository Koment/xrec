<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomArtists4 extends Migration
{
    public function up()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->text('consist')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->string('consist', 191)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
