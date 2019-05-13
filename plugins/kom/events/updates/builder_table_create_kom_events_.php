<?php namespace Kom\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomEvents extends Migration
{
    public function up()
    {
        Schema::create('kom_events_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('event_date');
            $table->string('location');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_events_');
    }
}
