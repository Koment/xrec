<?php namespace Kom\Contact\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKomContact extends Migration
{
    public function up()
    {
        Schema::create('kom_contact_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('description');
            $table->timestamp('created_at');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kom_contact_');
    }
}
