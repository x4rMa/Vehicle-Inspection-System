<?php

/********* USER RELATED EVENTS *********/
Event::listen('user.create', function($user)
{

	$body = "Hi, $user->firstname!

	Thank you for registering on the EAAS website.

	Please click on this link to activate your account: ";

	$body .= URL::to('email/'.$user->email.'/activate/'.$user->code);

	$body .= "You can add a vehicle for booking after you have activated your account.

	EAA Head Office 
	CONTACT PERSON: TOYOHIKO HASHINO
	Tel: +81-46-205-7611 
	MOB: +81-90-2230-8435
	Fax: +81-46-205-7610
	";

	mail($user->email, "Welcome to the EAAS Vehicle Inspection Portal!", $body);

	  return false;
});

Event::listen('user.resetpass', function($user, $code)
{

	$body = "Hi, ".$user->firstname."!

	Thank you for being a member of EAAS Vehicle Inspection Portal.

	Please click on this link to reset your password: ";

	$body .= URL::to('email/'.$user->email.'/code/'.$code);

	$body .= "
	You can add a vehicle for booking after you have activated your account.

	EAA Head Office 
	CONTACT PERSON: TOYOHIKO HASHINO
	Tel: +81-46-205-7611 
	MOB: +81-90-2230-8435
	Fax: +81-46-205-7610
	";

	mail($user->email, "EAAS Vehicle Inspection Portal - Reset Password!", $body);

	  return false;
});

Event::listen('user.resetpasssuccess', function($user)
{

	$body = "Hi, $user->firstname!

	Your password has been reset successfully.

	EAA Head Office 
	CONTACT PERSON: TOYOHIKO HASHINO
	Tel: +81-46-205-7611 
	MOB: +81-90-2230-8435
	Fax: +81-46-205-7610
	";

	mail($user->email, "EAAS Vehicle Inspection Portal - Password Changed!", $body);

	  return false;
});


/********* Vehicle RELATED EVENTS *********/

Event::listen('vehicle.certificate', function($vehicle)
{

	$body = "Hi, ".$vehicle->user->firstname ."!
	
	This is to notify you that your vehicle ($vehicle->make $vehicle->model) has been inspected and your certificate is ready for collection.

	Please login to your account to view or download it.

	Best Regards, 

	Administrator
	               
	East Africa Automobile Services 

	EAA Head Office 
	CONTACT PERSON: TOYOHIKO HASHINO
	Tel: +81-46-205-7611 
	MOB: +81-90-2230-8435
	Fax: +81-46-205-7610";

	mail($vehicle->user->email, "EAAS - Japan : Vehicle Inspection is Complete", $body);

	return false;
});




/*********VEHICLE RELATED EVENTS*********/

Event::listen('vehicle.create', function($vehicle)
{
  // Send welcome email
 
   
$body = "Hi ".$vehicle->user->firstname.",

Vehicle Owner: ".$vehicle->user->fullname."

Vehicle Make: ".$vehicle->make."

Vehicle Location:  ".$vehicle->located->location_name."

Reserved Date:  ".$vehicle->inspection_date."

Total Charges: ".$vehicle->located->location_charge."
                          
What you should do next?

To complete your booking, you need to make a payment of ".$vehicle->located->location_charge."  JPY.
 You can pay by cheque/postal order, electronic transfer or directly to our bank. 
 You must include your booking reference  ".$vehicle->user->email." as a payment reference so we can apply the payment to your account.

East Africa Automobile Service Co. Ltd,
Swift Code: BOTKJPJT
Account: 1478971
Yamato Branch
Mitsubishi Tokyo UFJ Bank

Best Regards, 

Administrator 
               
East Africa Automobile Services 

EAA Head Office 
CONTACT PERSON: TOYOHIKO HASHINO
Tel: +81-46-205-7611 
MOB: +81-90-2230-8435
Fax: +81-46-205-7610";
                
   mail(Auth::user()->email, "EAAS Vehicle Inspection Portal - Vehicle Added", $body);

  return false;
});
