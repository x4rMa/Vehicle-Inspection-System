<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certificates', function(Blueprint $table){
			$table->increments('id');
			$table->integer('vehicle_id')->unsigned();
			$table->string('certno', 100);
			$table->integer('issued_by')->unsigned();
			$table->boolean('status')->default(false); // 1 approved, 0 declined
			$table->timestamps();

			$table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
			$table->foreign('issued_by')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('certificates');
	}

}
