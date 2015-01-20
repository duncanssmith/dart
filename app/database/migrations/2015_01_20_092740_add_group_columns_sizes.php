<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupColumnsSizes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function(Blueprint $table)
        {
            $table->integer('columns')->nullable();            
            $table->integer('image_size')->nullable();
            $table->integer('layout')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function(Blueprint $table)
        {
            $table->dropColumn('columns');
            $table->dropColumn('image_size');
            $table->dropColumn('layout');
        });
    }

}
