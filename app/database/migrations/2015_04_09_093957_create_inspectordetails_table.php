<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectordetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inspectordetails', function(Blueprint $table){
			  $table->increments('id');
			  $table->integer('vehicle_id')->unsigned();
			  $table->integer('cust_id')->nullable();
			  $table->string('name', 100)->nullable();
			  $table->string('sno', 100)->nullable();
			  $table->string('chasisno', 100)->nullable();
			  $table->string('model', 100)->nullable();
			  $table->string('enginemodel', 100)->nullable();
			  $table->string('modelname', 100)->nullable();
			  $table->string('make', 100)->nullable();
			  $table->string('engineno', 100)->nullable();
			  $table->string('enginecc', 100)->nullable();
			  $table->string('yofr', 100)->nullable();
			  $table->string('yom', 100)->nullable();
			  $table->string('bodycolor', 100)->nullable();
			  $table->string('mileage', 100)->nullable();
			  $table->string('odometer', 100)->nullable();
			  $table->string('fueltype', 100)->nullable();
			  $table->string('teeringwheel', 100)->nullable();
			  $table->string('weight', 100)->nullable();
			  $table->string('frontweight', 100)->nullable();
			  $table->string('rearweight', 100)->nullable();
			  
			  $table->string('location', 100)->nullable();
			  $table->string('inspectorid', 100)->nullable();
			  $table->string('accellerationstatuss', 100)->nullable();
			  $table->string('co', 100)->nullable();
			  $table->string('costatus', 100)->nullable();
			  $table->string('abnormalbrake', 100)->nullable();
			  $table->string('abnormalbrakestatus', 100)->nullable();
			  $table->string('hc', 100)->nullable();
			  $table->string('hcstatus', 100)->nullable();
			  $table->string('diesel', 100)->nullable();
			  $table->string('sidslipinout', 100)->nullable();
			  $table->string('sidslipinoutstatus', 100)->nullable();
			  
			  $table->string('normalnoise', 100)->nullable();
			  $table->string('normalnoisestatus', 100)->nullable();
			  $table->string('badnoise1st', 100)->nullable();
			  $table->string('badnoise2nd', 100)->nullable();
			  $table->string('badnoisestatus', 100)->nullable();
			  $table->string('badnoiseaverage', 100)->nullable();
			  $table->string('luminancer', 100)->nullable();
			  $table->string('luminancerstatus', 100)->nullable();
			  $table->string('luminancel', 100)->nullable();
			  $table->string('luminancelstatus', 100)->nullable();
			  $table->string('attachmentr', 100)->nullable();
			  $table->string('attachmentrstatus', 100)->nullable();
			  
			 $table->string('attachmentl', 100)->nullable();
			  $table->string('attachmentlstatus', 100)->nullable();
			  $table->string('opticalr', 100)->nullable();
			  $table->string('opticalrstatus', 100)->nullable();
			  $table->string('opticall', 100)->nullable();
			  $table->string('opticallstatus', 100)->nullable();
			  $table->string('opticalaxisr', 100)->nullable();
			  $table->string('opticalaxisrstatus', 100)->nullable();
			  $table->string('opticalaxisl', 100)->nullable();
			  $table->string('opticalaxislstatus', 100)->nullable();
			  $table->string('engineresult', 100)->nullable();
			  $table->string('wheelbearingresult', 100)->nullable();
			  $table->string('funbeltresult', 100)->nullable();
			  $table->string('springsresult', 100)->nullable();
			  $table->string('batteryresult', 100)->nullable();
			  
			  $table->string('absorbersresult', 100)->nullable();
			  $table->string('mastercylresult', 100)->nullable();
			  $table->string('suspensionresult', 100)->nullable();
			  $table->string('carburretorresult', 100)->nullable();
			  $table->string('torueresult', 100)->nullable();
			  $table->string('fuelpipesresult', 100)->nullable();
			  $table->string('gearboxresult', 100)->nullable();
			  $table->string('injpumpresult', 100)->nullable();
			  $table->string('steeringrodresult', 100)->nullable();
			  $table->string('wirenarnessresult', 100)->nullable();
			  $table->string('whelcyliinderresult', 100)->nullable();
			  $table->string('generatorresult', 100)->nullable();
			  $table->string('brakerodresult', 100)->nullable();


			  $table->string('collsystresult', 100)->nullable();
			  $table->string('brakehoseresult', 100)->nullable();
			  $table->string('manifoldsresult', 100)->nullable();
			  $table->string('frontaxleresult', 100)->nullable();
			  $table->string('luberesult', 100)->nullable();
			  $table->string('shaftresult', 100)->nullable();
			  $table->string('prposhaftresult', 100)->nullable();
			  $table->string('axlehseresult', 100)->nullable();
			  $table->string('differential', 100)->nullable();
			  $table->string('tool', 100)->nullable();
			  $table->string('tyresize', 100)->nullable();
			  $table->string('jack', 100)->nullable();
			  $table->string('tyrecondition', 100)->nullable();
			  $table->string('puntrekit', 100)->nullable();
			  $table->string('tyreetc', 100)->nullable();
			  
			  $table->string('headlamp', 100)->nullable();
			  $table->string('steerwheel', 100)->nullable();
			  $table->string('indicator', 100)->nullable();
			  $table->string('pstaring', 100)->nullable();
			  $table->string('rear', 100)->nullable();
			  $table->string('horn', 100)->nullable();
			  $table->string('brake', 100)->nullable();
			  $table->string('gauges', 100)->nullable();
			  $table->string('etc', 100)->nullable();
			  $table->string('climatecntrl', 100)->nullable();
			  $table->string('doorr', 100)->nullable();
			  $table->string('windowss', 100)->nullable();
			  $table->string('interiorr', 100)->nullable();
			  $table->string('wipers', 100)->nullable();
			  $table->string('exteriorr', 100)->nullable();
			  $table->string('mirrorrs', 100)->nullable();
			  $table->string('underbody', 100)->nullable();
			  
			  $table->string('atmt', 100)->nullable();
			  $table->string('safbelts', 100)->nullable();
			  $table->string('brekpedal', 100)->nullable();
			  $table->string('radiationdose', 100)->nullable();
			  $table->string('brakeboost', 100)->nullable();
			  $table->string('clutcchpedal', 100)->nullable();
			  $table->string('clutchfunction', 100)->nullable();
			  $table->string('exhaustsyystem', 100)->nullable();
			  $table->string('airsuspenresult', 100)->nullable();
			  $table->string('airbreakkresult', 100)->nullable();
			  $table->string('fueltankkresult', 100)->nullable();
			  $table->string('file', 100)->nullable();

			  $table->softDeletes();
			  $table->timestamps();

			  $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
			  
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inspectordetails');
	}

}
