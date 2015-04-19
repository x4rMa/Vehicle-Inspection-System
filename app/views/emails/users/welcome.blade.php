<h3>Hi, {{ $user->firstname }}!</h3>
<br>
Thank you for registering on the EAAS website.";

<br>

Please click on this link to activate your account: <a href="{{ URL::to('email/'.$user->email.'/activate/'.$user->code) }}"> Activate Account</a>

<br>

You can add a vehicle for booking after you have activated your account.

<br>

<p>EAA Head Office 
<p>CONTACT PERSON: TOYOHIKO HASHINO
<p>Tel: +81-46-205-7611 
<p>MOB: +81-90-2230-8435
<p>Fax: +81-46-205-7610

