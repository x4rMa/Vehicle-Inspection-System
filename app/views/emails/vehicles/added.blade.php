Hi {{ Auth::user()->firstname }},
<br>
Vehicle Owner: {{ Auth::user()->fullname }}
<br>
Vehicle Make: {{ $vehicle->make }}
<br>
Vehicle Location: {{ $vehicle->located->location_name }}
<br>
Reserved Date: {{ $vehicle->inspection_date }}
Total Charges: {{ $vehicle->charge }}
<br><br>
Best Regards, <br>
<br>
Administrator <br>
<br>                
East Africa Automobile Services <br>
<br>
<p>EAA Head Office 
<p>CONTACT PERSON: TOYOHIKO HASHINO
<p>Tel: +81-46-205-7611 
<p>MOB: +81-90-2230-8435
<p>Fax: +81-46-205-7610
                            
What you should do next?
<br>
To complete your booking, you need to make a payment of {{ $vehicle->charge }} JPY.
 You can pay by cheque/postal order, electronic transfer or directly to our bank. 
 You must include your booking reference {{ Auth::user()->email }} as a payment reference so we can apply the payment to your account.

<p>East Africa Automobile Service Co. Ltd,
<p>Swift Code: BOTKJPJT
<p>Account: 1478971
<p>Yamato Branch
<p>Mitsubishi Tokyo UFJ Bank
<br>
Best Regards,
<br>
Administrator
<br>                  
East Africa Automobile Services
                