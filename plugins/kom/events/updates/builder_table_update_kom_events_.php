<?php namespace Kom\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomEvents extends Migration
{
    public function up()
    {
        Schema::table('kom_events_', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('kom_events_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
