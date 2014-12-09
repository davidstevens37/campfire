<?php

/**
 * User
 */
class User extends Model {

	/**
	 * Insert User
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'email' => $input['email'],
			'password' => $input['password'],
			'username' => $input['username'],
			'phone' => $input['phone'],
			'zipcode' => $input['zipcode'],
			'age' => $input['age'],
		
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('user', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	/**
	 * Update User
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'email' => $input['email'],
			'password' => $input['password']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		db::update('user', $sql_values, "WHERE user_id = {$this->user_id}");
		
		// Return a new instance of this user as an object
		return new User($this->user_id);

	}

	public static function get_user($username, $password) {

		$sql_values = [
			'username' => $username,
			'password' => $password
		];


		$sql_values = db::auto_quote($sql_values);

		$sql = 'SELECT * FROM user WHERE username = ' . $sql_values['username'] . ' AND password = ' . $sql_values['password'];

		$results = db::execute($sql);

		return $results->num_rows ? $results : null ;

	}

}