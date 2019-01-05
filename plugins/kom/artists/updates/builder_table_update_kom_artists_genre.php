<?php namespace Kom\Artists\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomArtistsGenre extends Migration
{
    public function up()
    {
        Schema::table('kom_artists_genre', function($table)
        {
            $table->renameColumn('genre', 'genre_name');
        });
    }
    
    public function down()
    {
        Schema::table('kom_artists_genre', function($table)
        {
            $table->renameColumn('genre_name', 'genre');
        });
    }
}
