<?php

class PhoneValidationRule extends \Illuminate\Validation\Validator {
 
	 public function validatePhone($attribute, $value, $parameters)
	 {
	 	return preg_match("/^\+\d[0-9]{11}", $value);
	 }
 
}
 
// Register your custom validation rule
 
Validator::resolver(function($translator, $data, $rules, $messages)
{
 	return new PhoneValidationRule($translator, $data, $rules, $messages);
});
