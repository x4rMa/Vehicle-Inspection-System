<h3>Hi, {{ Auth::user()->firstname }}!</h3>
 
<p>You have added a new vehicle!</p>

<p>Vehicle Owner: {{ Auth::user()->fullname }}</p> 
<p>Telephone: {{ Auth::user()->phone }}</p>

<p>Vehicle Make: {{ $vehicle->make }}</p>
<p>Vehicle Model: {{ $vehicle->model }}</p>
<p>Vehicle Export Certificate:  {{ 'http://eaa-s.jp/Vehicle-Export-Certificates/'.$vehicle->vec }}</p>
<p>Vehicle Location: {{ Location::find($vehicle->location)->location_name }}</p>
<p>Reserved Date: {{ substr($vehicle->inspection_date, 0, 10) }}</p>
<p>Total Charges: {{ number_format($vehicle->charge) }} JPY</p>

<br>
Best Regards, 
<br>
Administrator 
<br>
East Africa Automobile Services 
