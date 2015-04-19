<div class="account-create">
  
        
<table width="1104">
<tr>
<td width="125">
            Customer Name<br /></td>
            <td width="225"><label for="name"></label>
              <input type="text" name="name" value="{{ $vehicle->user->fullname }}" readonly id="name" />              <br /></td>
              <td width="142">           
              S/No <br /></td>
               <td width="224"><input type="text" name="sno" value=""  id="name2" />                 <br /></td>
                <td colspan="2">                  &nbsp;&nbsp;&nbsp;&nbsp;Attach File:
                  <input type="file" name="file"/>                   
                  </td>
               </tr>
              <tr>
<td colspan="6"><strong>VEHICLE DETAILS</strong></td>
            </tr>
              <tr>
  <td width="125">Chassis No<br /></td>
                <td width="225"><input type="text" name="chasisno" value="{{ $vehicle->user->chasis }}" readonly id="name3" /></td>
                <td width="142">Model</td>
                <td width="224"><input type="text" name="model" value="{{ $vehicle->model }}" readonly  id="name4" /></td>
                <td width="133">Engine Model</td>
                <td width="227"><input type="text" name="enginemodel" id="name4" value=""  /></td>
                </tr>
              <tr>
  <td width="125">Model Name<br /></td>
                <td width="225"><input type="text" name="modelname" id="name3" value="{{ $vehicle->model }}" readonly   /></td>
                <td width="142">Make</td>
                <td width="224"><input type="text" name="make" id="name4" value="{{ $vehicle->make }}" readonly   /></td>
                <td>Engine Number</td>
                <td><input type="text" name="engineno" id="engineno" value="{{ $vehicle->engineno }}" readonly   /></td>
                </tr>
              <tr>
  <td width="125">Engine Capacity<br /></td>
                <td width="225"><input type="text" name="enginecc" id="name3"  value="{{ $vehicle->enginecc }}" readonly  /></td>
                <td width="142">1st Registration Year</td>
                <td width="224"><input type="text" name="yofr" readonly id="name4" value="{{ $vehicle->yor }}"  /></td>
                <td>Manufacture Year</td>
                <td><input type="text" name="yom" id="yom" value="{{ $vehicle->yom }}" readonly  /></td>
                </tr>
              <tr>
  <td width="125">Body Color<br /></td>
                <td width="225"><input type="text" name="bodycolor" value="{{ $vehicle->inspectordetails->bodycolor }}" id="name3" /></td>
                <td width="142">Mileage (Paper)</td>
                <td width="224"><input type="text" name="mileage" value="{{ $vehicle->mileage }}" readonly id="name4" /></td>
                <td>Odometer</td>
                <td><input type="text" name="odometer" id="odometer" value="{{ $vehicle->odometerunit }}" readonly /></td>
                </tr>
              <tr>
  <td width="125">Fuel Type<br /></td>
                <td width="225"><input type="text" name="fueltype" value="{{ $vehicle->inspectordetails->fueltype }}"  id="name3" /></td>
                <td width="142">Steering Wheel</td>
                <td width="224">
                          {{ Form::select('teeringwheel', ['0'=>'Please select'] + ['Left'=>'Left', 'Right'=>'Right']) }}
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="125">Vehicle Weight<br /></td>
                <td width="225"><input type="text" name="weight" value="{{ $vehicle->inspectordetails->weight }}"  id="name3" /></td>
                <td width="142">Front Axis Weight</td>
                <td width="224"><input type="text" name="frontweight" value="{{ $vehicle->inspectordetails->frontweight }}"  id="name4" /></td>
                <td>Rear Axis Weight</td>
                <td><input type="text" name="rearweight" value="{{ $vehicle->inspectordetails->rearweight }}"  id="rearweight" /></td>
                </tr>
              <tr>
  <td width="125"><br /></td>
                <td width="225">&nbsp;</td>
                <td width="142">&nbsp;</td>
                <td width="224">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                </table>
<table width="1140">
  <tr>
<td colspan="6"><strong>INSPECTION DETAILS</strong></td>
            </tr>
              <tr>
  <td width="153">Location<br /></td>
                <td width="231"><input type="text" name="location" value="{{ $vehicle->inspectordetails->location }}" id="name3" /></td>
                <td width="25">&nbsp;</td>
                <td>Inspector ID</td>
                <td width="228"><input type="text" name="inspectorid" id="name4" value="{{ $vehicle->inspectordetails->inspectorid }}" /></td>
                <td width="13">&nbsp;</td>
                <td width="13">&nbsp;</td>
                <td width="228">&nbsp;</td>
                <td width="18">&nbsp;</td>
                </tr>
              <tr>
  <td width="153">&nbsp;</td>
                <td width="231">&nbsp;</td>
                <td width="25">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">[ Test Drive ]<br /></td>
                <td width="231">Pass/Fail</td>
                <td width="25">&nbsp;</td>
                <td>Exhaust</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Pass/Fail</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">Abnormal at Accelleration<br /></td>
                <td width="231">
                    {{ Form::select('accellerationstatuss', ['0'=>'Please select'] + ['Left'=>'Left', 'Right'=>'Right']) }}
                </td>
                <td width="25">&nbsp;</td>
                <td>CO</td>
                <td><input type="text" name="co" id="name4" value="{{ $vehicle->inspectordetails->co }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                  {{ Form::select('costatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
           
                </td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">Abnormal at Brake Tester<br /></td>
                <td width="231">
                    {{ Form::select('abnormalbrakestatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
                </td>
                <td width="25">&nbsp;</td>
                <td>HC</td>
                <td><input type="text" name="hc" id="name4" value="{{ $vehicle->inspectordetails->hc }}"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td> {{ Form::select('hcstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
               </td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">&nbsp;</td>
                <td width="231">&nbsp;</td>
                <td width="25">&nbsp;</td>
                <td>Diesel</td>
                <td><input type="text" name="diesel" id="name4" value="{{ $vehicle->inspectordetails->diesel }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
  <td width="153">&nbsp;</td>
                <td width="231">&nbsp;</td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">[ Side Slip ]</td>
                <td width="231">&nbsp;</td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">IN . OUT</td>
                <td width="231">&nbsp;</td>
                <td colspan="3">[ Exhaust Proximity Noise ]</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Pass/Fail</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153"><input type="text" name="sidslipinout" id="name43" value="{{ $vehicle->inspectordetails->sidslipinout }}"  /></td>
                <td width="231">
                  {{ Form::select('sidslipinoutstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
               </td>
                <td width="25">Normal</td>
                <td width="173">&nbsp;</td>
                <td><input type="text" name="normalnoise" id="name47" value="{{ $vehicle->inspectordetails->normalnoise }}"  /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                 {{ Form::select('normalnoisestatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
             </td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">&nbsp;</td>
                <td width="231">&nbsp;</td>
                <td width="25">Bad</td>
                <td>1st</td>
                <td><input type="text" name="badnoise1st" id="name46" value="{{ $vehicle->inspectordetails->badnoise1st }}"  /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>2nd</td>
                   <td><input type="text" name="badnoise2nd" id="name45" value="{{ $vehicle->inspectordetails->badnoise2nd }}"  /></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>
                            {{ Form::select('badnoisestatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
          </td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">&nbsp;</td>
                <td width="231">&nbsp;</td>
                <td width="25">&nbsp;</td>
                <td width="173">AVERAGE</td>
                <td><input type="text" name="badnoiseaverage" id="name44" value="{{ $vehicle->inspectordetails->badnoiseaverage }}"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td>[ Headlights ]</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Pass/Fail</td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Luminance</td>
                   <td colspan="2">R
                     <input type="text" name="luminancer" id="name12"  value="{{ $vehicle->inspectordetails->luminancer }}" /></td>
                   <td>&nbsp;</td>
                   <td>
                     {{ Form::select('luminancerstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td colspan="2">L
                     <input type="text" name="luminancel" value="{{ $vehicle->inspectordetails->luminancel }}" id="name13" /></td>
                   <td>&nbsp;</td>
                   <td>
                    {{ Form::select('luminancelstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
       </td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Attachment (Height)</td>
                   <td colspan="2">R
                     <input type="text" name="attachmentr" value="{{ $vehicle->inspectordetails->attachmentr }}" id="name5" /></td>
                   <td>&nbsp;</td>
                   <td>
                    {{ Form::select('attachmentrstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
    </td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td colspan="2">L
                     <input type="text" name="attachmentl" value="{{ $vehicle->inspectordetails->attachmentl }}" id="name6" /></td>
                   <td>&nbsp;</td>
                   <td>
                    {{ Form::select('attachmentlstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
   </td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
  <td width="153">&nbsp;</td>
                <td width="231">&nbsp;</td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Optical Axis (Under)</td>
                   <td colspan="2">R
                     <input type="text" name="opticalr" id="name8" value="{{ $vehicle->inspectordetails->opticalr }}" /></td>
                   <td>&nbsp;</td>
                   <td>
                   {{ Form::select('opticalrstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}

</td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td colspan="2">L
                     <input type="text" name="opticall" value="{{ $vehicle->inspectordetails->opticall }}" id="name9" /></td>
                   <td>&nbsp;</td>
                   <td>
                         {{ Form::select('opticallstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
                       </td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Optical Axis (RL)</td>
                   <td colspan="2">R
                     <input type="text" name="opticalaxisr" id="name10" value="{{ $vehicle->inspectordetails->opticalaxisr }}" /></td>
                   <td>&nbsp;</td>
                   <td>
                           {{ Form::select('opticalaxisrstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
                         </td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td colspan="2">L
                     <input type="text" name="opticalaxisl" value="{{ $vehicle->inspectordetails->opticalaxisl }}" id="name11" /></td>
                   <td>&nbsp;</td>
                   <td>
                     {{ Form::select('opticalaxislstatus', ['0'=>'Please select'] + ['Pass'=>'Pass', 'Fail'=>'Fail']) }}
                   </td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                
            </table>
              
              <table width="1122">
                 <tr>
<td colspan="6"><strong>VISUAL AND NOISE INSPECTION</strong></td>
            </tr>
              <tr>
                <td>[ Engine ]<br /></td>
                <td>Result</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>[ Underbody ]</td>
                <td>&nbsp;</td>
                <td>Result</td>
                <td>&nbsp;</td>
  <td width="18">&nbsp;</td>
                </tr>
              <tr>
                <td>Engine<br /></td>
                <td><input type="text" name="engineresult" value="{{ $vehicle->inspectordetails->engineresult }}" id="name25" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Wheel Bearing</td>
                <td>&nbsp;</td>
                <td><input type="text" name="wheelbearingresult" value="{{ $vehicle->inspectordetails->wheelbearingresult }}" id="name25" /></td>
                <td>&nbsp;</td>
  <td>&nbsp;</td>
                </tr>
              <tr>
                <td>Fun Belt<br /></td>
                <td><input type="text" name="funbeltresult" value="{{ $vehicle->inspectordetails->funbeltresult }}" id="name26" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Springs</td>
                <td>&nbsp;</td>
                <td><input type="text" name="springsresult" value="{{ $vehicle->inspectordetails->springsresult }}" id="name26" /></td>
                <td>&nbsp;</td>
  <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">Battery</td>
  <td><input type="text" name="batteryresult" id="name27" value="{{ $vehicle->inspectordetails->batteryresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td>&nbsp;</td>
                <td>Shock Absorbers</td>
                <td>&nbsp;</td>
                <td><input type="text" name="absorbersresult" id="name27" value="{{ $vehicle->inspectordetails->absorbersresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">Master Cylinder</td>
  <td><input type="text" name="mastercylresult" id="mastercylresult" value="{{ $vehicle->inspectordetails->mastercylresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td>&nbsp;</td>
                <td>Suspenssion Fixing</td>
                <td>&nbsp;</td>
                <td><input type="text" name="suspensionresult" id="name28" value="{{ $vehicle->inspectordetails->suspensionresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
  <td width="153">Carburretor</td>
  <td><input type="text" name="carburretorresult" id="carburretorresult" value="{{ $vehicle->inspectordetails->carburretorresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Torque Rod</td>
                <td>&nbsp;</td>
                <td><input type="text" name="torueresult" id="name30" value="{{ $vehicle->inspectordetails->torueresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
  <td width="153">Fuel Pipes</td>
  <td><input type="text" name="fuelpipesresult" id="name29" value="{{ $vehicle->inspectordetails->fuelpipesresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Gear Box</td>
                <td>&nbsp;</td>
                <td><input type="text" name="gearboxresult" id="name29" value="{{ $vehicle->inspectordetails->gearboxresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">Injection Pump</td>
  <td><input type="text" name="injpumpresult" id="name31" value="{{ $vehicle->inspectordetails->injpumpresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Steering Rod/Arm</td>
                <td>&nbsp;</td>
                <td><input type="text" name="steeringrodresult" id="name31" value="{{ $vehicle->inspectordetails->steeringrodresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">Wiring Harness</td>
  <td><input type="text" name="wirenarnessresult" id="name32" value="{{ $vehicle->inspectordetails->wirenarnessresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Wheel Cylinder</td>
                <td>&nbsp;</td>
                <td><input type="text" name="whelcyliinderresult" id="name32" value="{{ $vehicle->inspectordetails->whelcyliinderresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">Generator</td>
  <td><input type="text" name="generatorresult" id="name33" value="{{ $vehicle->inspectordetails->generatorresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Brake Rod/Cable</td>
                <td>&nbsp;</td>
                <td><input type="text" name="brakerodresult" id="name33" value="{{ $vehicle->inspectordetails->brakerodresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">Cooling System</td>
  <td><input type="text" name="collsystresult" id="name34" value="" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Brake Hose/Pipe</td>
                <td>&nbsp;</td>
                <td><input type="text" name="brakehoseresult" id="name34" value="{{ $vehicle->inspectordetails->brakehoseresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 </tr>
                 <tr>
  <td width="153">Manifolds</td>
  <td><input type="text" name="manifoldsresult" id="name35" value="{{ $vehicle->inspectordetails->manifoldsresult }}" /></td>
                <td width="25">&nbsp;</td>
                <td width="173">&nbsp;</td>
                <td>Front Axle</td>
                <td>&nbsp;</td>
                <td><input type="text" name="frontaxleresult" id="name35" value="{{ $vehicle->inspectordetails->frontaxleresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Lubrication System</td>
                   <td><input type="text" name="luberesult" id="name36" value="{{ $vehicle->inspectordetails->luberesult }}" /></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Drive Shaft</td>
  <td>&nbsp;</td>
  <td><input type="text" name="shaftresult" id="name36" value="{{ $vehicle->inspectordetails->shaftresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>CFC</td>
                   <td>R-134a . R-12</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Propeller Shaft</td>
  <td>&nbsp;</td>
  <td><input type="text" name="prposhaftresult" id="name32" value="{{ $vehicle->inspectordetails->prposhaftresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Axle Housing</td>
  <td>&nbsp;</td>
  <td><input type="text" name="axlehseresult" id="name33" value="{{ $vehicle->inspectordetails->axlehseresult }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>[ Equipment ]<br /></td>
                   <td>Result</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Differential</td>
  <td>&nbsp;</td>
  <td><input type="text" name="differential" id="name34" value="{{ $vehicle->inspectordetails->differential }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Tool<br /></td>
                   <td><input type="text" name="tool" id="name14" value="{{ $vehicle->inspectordetails->tool }}" /></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Tyre Size</td>
  <td>&nbsp;</td>
  <td><input type="text" name="tyresize" id="name35" value="{{ $vehicle->inspectordetails->tyresize }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Jack<br /></td>
                   <td><input type="text" name="jack" id="name15" value="{{ $vehicle->inspectordetails->jack }}" /></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
  <td>Tyre Condition</td>
                <td>&nbsp;</td>
                <td><input type="text" name="tyrecondition" id="name36" value="{{ $vehicle->inspectordetails->tyrecondition }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Punture Repair Kit</td>
                   <td><input type="text" name="puntrekit" id="name24" value="{{ $vehicle->inspectordetails->puntrekit }}" /></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Tyre-Etc</td>
  <td>&nbsp;</td>
  <td><input type="text" name="tyreetc" id="name37" value="{{ $vehicle->inspectordetails->tyreetc }}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>[ Lights ]</td>
                   <td>Result</td>
                   <td>&nbsp;</td>
                   <td>[ Interior ]</td>
                   <td>Result</td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Head Lamp</td>
                   <td><input type="text" name="headlamp" id="name21" value="{{ $vehicle->inspectordetails->headlamp }}" /></td>
                   <td>&nbsp;</td>
                   <td>Steering Wheel</td>
                   <td><input type="text" name="steerwheel" id="name21" value="{{ $vehicle->inspectordetails->steerwheel }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Idicator</td>
                   <td><input type="text" name="indicator" id="name20" value="{{ $vehicle->inspectordetails->indicator }}" /></td>
                   <td>&nbsp;</td>
                   <td>Power Steering</td>
                   <td><input type="text" name="pstaring" id="name20" value="{{ $vehicle->inspectordetails->pstaring }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Rear</td>
                   <td><input type="text" name="rear" id="name7" value="{{ $vehicle->inspectordetails->rear }}" /></td>
                   <td>&nbsp;</td>
                   <td>Horn</td>
                   <td><input type="text" name="horn" id="name7" value="{{ $vehicle->inspectordetails->horn }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Brake</td>
                   <td><input type="text" name="brake" id="name19" value="{{ $vehicle->inspectordetails->brake }}" /></td>
                   <td>&nbsp;</td>
                   <td>Gauges</td>
                   <td><input type="text" name="gauges" id="name19" value="{{ $vehicle->inspectordetails->gauges }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Etc</td>
                   <td><input type="text" name="etc" id="name18" value="{{ $vehicle->inspectordetails->etc }}" /></td>
                   <td>&nbsp;</td>
                   <td>Climate Control</td>
                   <td><input type="text" name="climatecntrl" id="name18" value="{{ $vehicle->inspectordetails->climatecntrl }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Door</td>
                   <td><input type="text" name="doorr" id="name21" value="{{ $vehicle->inspectordetails->doorr }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>[ Damage ]</td>
                   <td>Result</td>
                   <td>&nbsp;</td>
                   <td>Windows</td>
                   <td><input type="text" name="windowss" id="name20" value="{{ $vehicle->inspectordetails->windowss }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Interior</td>
                   <td><input type="text" name="interiorr" id="name12" value="{{ $vehicle->inspectordetails->interiorr }}" /></td>
                   <td>&nbsp;</td>
                   <td>Wipers</td>
                   <td><input type="text" name="wipers" id="name7" value="{{ $vehicle->inspectordetails->wipers }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbspnbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Exterior</td>
                   <td><input type="text" name="exteriorr" id="name38" value="{{ $vehicle->inspectordetails->exteriorr }}" /></td>
                   <td>&nbsp;</td>
                   <td>Mirrows (Back and Sides)</td>
                   <td><input type="text" name="mirrorrs" id="name19" value="{{ $vehicle->inspectordetails->mirrorrs }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Underbody</td>
                   <td><input type="text" name="underbody" id="name39" value="{{ $vehicle->inspectordetails->underbody }}" /></td>
                   <td>&nbsp;</td>
                   <td>A/T.M/T</td>
                   <td><input type="text" name="atmt" id="name18" value="{{ $vehicle->inspectordetails->atmt }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Safety Belts</td>
                   <td><input type="text" name="safbelts" id="name21" value="{{ $vehicle->inspectordetails->safbelts }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>[ Radiation Dose ]</td>
                   <td>Result</td>
                   <td>&nbsp;</td>
                   <td>Brake Pedal</td>
                   <td><input type="text" name="brekpedal" id="name20" value="{{ $vehicle->inspectordetails->brekpedal }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td><input type="text" name="radiationdose" id="name12" value="{{ $vehicle->inspectordetails->radiationdose }}" /></td>
                   <td>&nbsp;</td>
                   <td>Brake Booster</td>
                   <td><input type="text" name="brakeboost" id="name7" value="{{ $vehicle->inspectordetails->brakeboost }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Clutch Pedal</td>
                   <td><input type="text" name="clutcchpedal" id="name19" value="{{ $vehicle->inspectordetails->clutcchpedal }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>Clutch Function</td>
                   <td><input type="text" name="clutchfunction" id="name18" value="{{ $vehicle->inspectordetails->clutchfunction }}" /></td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>[ Etc ]</td>
                   <td>Result</td>
                   <td>&nbsp;</td>
                   <td colspan="3" rowspan="12"><img src="{{ URL::asset('assets/images/vehicle1.png') }}" alt="" height="347" /></td>
                   <td>[ Accessory ]</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Exhaust System</td>
                   <td><input type="text" name="exhaustsyystem" id="name12" value="{{ $vehicle->inspectordetails->exhaustsyystem }}" /></td>
                   <td>&nbsp;</td>
                   <td colspan="3">Service Record</td>
                </tr>
                 <tr>
                   <td>Air Suspension</td>
                   <td><input type="text" name="airsuspenresult" id="name40" value="{{ $vehicle->inspectordetails->airsuspenresult }}" /></td>
                   <td>&nbsp;</td>
                   <td>A/G . Navigation</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Air Brake</td>
                   <td><input type="text" name="airbreakkresult" id="name41" value="{{ $vehicle->inspectordetails->airbreakkresult }}" /></td>
                   <td>&nbsp;</td>
                   <td>Audio . Alloy Wheel</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>Fuel Tank</td>
                   <td><input type="text" name="fueltankkresult" id="name42"  value="{{ $vehicle->inspectordetails->fueltankkresult }}"/></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td colspan="3" rowspan="7"><img src="{{ URL::asset('assets/images/vehicle2.png') }}" alt="" /></td>
                </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   </tr>
                 <tr>
                   <td colspan="9"><img src="{{ URL::asset('assets/images/formfooter.png') }}" alt=""  /></td>
                   </tr>
                 <tr>
                   <td colspan="2">&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>
                     </td>
                   <td colspan="5">
                  
                   </td>
  </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
  <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                   <td colspan="2">&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>
                     <input type="submit" class="btn btn-primary" name="medrep" id="submit" value="Submit" /></td>
                   <td colspan="5">            </td>
  </tr>
                
              </table>
              
        <div>
            

