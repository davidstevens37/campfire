<?php 
Class Validator {

	protected static $regs = [
	
		'first_name' => '/^[A-Za-z]{1,20}$/',
		'last_name' => '/^[A-Za-z]{1,20}$/',
		'username' => '/^[a-zA-Z0-9]{3,12}$/',
		'password' => '/^[a-zA-Z0-9]{3,20}$/',
		'email' => '/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/i',
		'user_id' => '/[0-9]{1,9}/',
		'event_id' => '/[0-9]{1,9}/',
		'phone' => '/[0-9]{1,9}/',
		'zipcode' => '/[0-9]{5}/',
		'age' => '/[0-9]{1,3}/',
		'comment' => '/./'
	];


	// Loops through array and validates based on regs. 
	// returns a valid array or an error array with only the ones containing validation errors
	public static function validate($fields) {

		$valid = [];
		$errors = [];

		foreach ($fields as $key => $value) {
			if (preg_match(self::$regs[$key], $value)) {
				$valid[$key] = $value;
			} else {
				$errors['error'] = true;
				$errors[$key] = $value; 
			}
		}

		if (empty($errors)) {
			return $valid;
		} else {
			return $errors;
		}
	}
	

} 