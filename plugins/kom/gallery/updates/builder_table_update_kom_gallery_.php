<?php namespace Kom\Gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomGallery extends Migration
{
    public function up()
    {
        Schema::table('kom_gallery_', function($table)
        {
            $table->text('slug');
        });
    }
    
    public function down()
    {
        Schema::table('kom_gallery_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
