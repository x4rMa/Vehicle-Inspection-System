What you should do next?
<br>
To complete your booking, you need to make a payment of ".$pa.". You can pay by cheque/postal order, electronic transfer or directly to our bank. You must include your booking reference $email as a payment reference so we can apply the payment to your account.

<p>East Africa Automobile Service Co. Ltd,
<p>Swift Code: BOTKJPJT
<p>Account: 1478971
<p>Yamato Branch
<p>Mitsubishi Tokyo UFJ Bank
<br>
Best Regards,
<br>"; 
Administrator
<br>                  
East Africa Automobile Services
                

$to = $d['email'];


$subject = "Re: EAAS New User Registered Successfully"; 

mail($to, $subject, $body, $headers);	


                $htmlStr2 = "Vehicle Owner: ".$d['name']."<br>";
				$htmlStr2 .= "Telephone: ".$d['tel']."<br>";
				$htmlStr2 .= "Email: ".$d['email']."<br>";
				$htmlStr2 .= "City: ".$d['city']."<br>";
				$htmlStr2 .= "<br>";
				$htmlStr2 .= "Vehicle Make: ".$make."<br>";
				$htmlStr2 .= "Vehicle Export Certificate: http://eaa-s.jp/Vehicle-Export-Certificates/".$uploader->uploadName."<br>";
				$htmlStr2 .= "Vehicle Location: ".$vlocation."<br>";
				$htmlStr2 .= "Reserved Date: ".$date."<br>";
				$htmlStr2 .= "Total Charges: ".$pa."<br>";
				$htmlStr2 .= "<br><br>";
				$htmlStr2 .= "Best Regards, <br>"; 
				$htmlStr2 .= "<br>"; 
				$htmlStr2 .= "Administrator <br>"; 
				$htmlStr2 .= "<br>";                      
                $htmlStr2 .= "East Africa Automobile Services <br>"; 
                $htmlStr2 .= "<br><br>You can make changes to your booking by contacting us on 
				             <p>EAA Head Office 
				             <p>CONTACT PERSON: TOYOHIKO HASHINO
				             <p>Tel: +81-46-205-7611 
		                             <p>MOB: +81-90-2230-8435
		                             <p>Fax: +81-46-205-7610";
                            

$body2 = $htmlStr2;

$subject2 = "Re: Vehicle Inspection Reservation"; 


$to2 = 'Inspection@eaa-s.jp';
$to3 = "info@eaa-s.jp";
$to4 = "prosper@eaa-s.jp";


//to admin
mail($to2, $subject2, $body2, $headers);
mail($to3, $subject2, $body2, $headers);
mail($to4, $subject2, $body2, $headers);
//to client
mail($to, $subject2, $body2, $headers);

	}else{ ?>
	<?php
ob_start();