<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table){
			
			$table->increments('id');
			
			$table->integer('user_id')->unsigned();
			$table->string('chasis', 100);
			$table->string('engineno', 100)->nullable();
			$table->string('enginecc', 100);
			$table->integer('yor');
			$table->integer('yom')->nullable();
			$table->string('make');
			$table->string('model');
			$table->integer('location_id')->unsigned();
			$table->string('destination');
			$table->string('vec');
			$table->decimal('charge', 10, 2);
			$table->dateTime('inspection_date');
			$table->boolean('paid')->default(false);
			$table->integer('staff_id')->nullable();
			$table->softDeletes();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles');
	}

}
