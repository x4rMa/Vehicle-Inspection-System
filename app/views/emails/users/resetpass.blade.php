<h3>Hi, {{ $user->firstname }}!</h3>
<br>
You have received this email because you want to reset your EAAS Vehicle Inspection Portal password.

<br>

Please click on this link to reset your password: <a href="{{ URL::to('email/'.$user->email.'/reset/'.$user->code) }}"> Activate Account</a>

<br>

You can add a vehicle for booking after you have activated your account.

<br>

<p>EAA Head Office 
<p>CONTACT PERSON: TOYOHIKO HASHINO
<p>Tel: +81-46-205-7611 
<p>MOB: +81-90-2230-8435
<p>Fax: +81-46-205-7610

