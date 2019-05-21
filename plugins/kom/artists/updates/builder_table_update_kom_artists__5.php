<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomArtists5 extends Migration
{
    public function up()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->string('vk')->nullable();
            $table->string('yamuz')->nullable();
            $table->string('itunes')->nullable();
            $table->string('gmuz')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('kom_artists_', function($table)
        {
            $table->dropColumn('vk');
            $table->dropColumn('yamuz');
            $table->dropColumn('itunes');
            $table->dropColumn('gmuz');
        });
    }
}
