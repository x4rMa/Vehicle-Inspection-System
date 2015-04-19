<?php
 
class PhoneValidationRule extends \Illuminate\Validation\Validator {
 
	public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array()) 
	{ 
	
		parent::__construct($translator, $data, $rules, $messages, $customAttributes); 

		$this->setCustomMessages(array(
			'phone' => 'The phone number is not valid. Please confirm and try again.'
		)); 
	}

	public function validatePhone($attribute, $value, $parameters)
	 {

	 	return ( $value[0] == "+" && is_numeric(substr($value, 1)) && strlen($value) == 13) ? true : false;
	 	
	 }
 
}
