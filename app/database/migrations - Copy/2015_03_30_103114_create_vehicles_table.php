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
			$table->integer('user_id');
			$table->string('chasis', 100);
			$table->string('engineno', 100);
			$table->string('enginecc', 100);
			$table->integer('yom');
			$table->integer('yor');
			$table->string('make');
			$table->string('model');
			$table->string('location');
			$table->string('vec');
			$table->decimal('charge', 10, 2);
			$table->dateTime('inspection_date');
			$table->softDeletes();
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
		Schema::drop('vehicles');
	}

}
