<?php namespace Kom\Contact\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKomContact extends Migration
{
    public function up()
    {
        Schema::table('kom_contact_', function($table)
        {
            $table->string('form_title')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('kom_contact_', function($table)
        {
            $table->dropColumn('form_title');
        });
    }
}
