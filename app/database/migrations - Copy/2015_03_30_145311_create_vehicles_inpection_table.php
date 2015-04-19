<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesInpectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('vehicles_inpection', function(Blueprint $table){
			$table->increments('id');
			$table->integer('vehicle_id');

			$table->string('mileage');
			$table->string('pstatus');
			$table->string('istatus');
			$table->string('certno');
			$table->text('comment');
			$table->string('reistatus');
			$table->string('inspe_comment');
			$table->string('amount_paid');
			$table->string('reinspe_amount');
			$table->string('vvalue');
			$table->string('issue_date');
			$table->string('inspedate');
			$table->string('weekreport');
			$table->string('monthreport');
			$table->string('odometreunit');
			$table->string('inspecentre');

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
		Schema::drop('vehicles_inpection');
	}

}
