<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	        Schema::create('covers', function($table)
            {
                $table->increments('id');
                $table->string('reference', 16)->nullable();
                $table->string('title', 255)->nullable();
                $table->string('media', 255)->nullable();
                $table->string('dimensions', 32)->nullable();
                $table->string('description', 255)->nullable();
                $table->string('notes', 255)->nullable();
                $table->string('cover_date', 32)->nullable();
                $table->boolean('is_current')->default(false);
                $table->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('covers');
	}

}
