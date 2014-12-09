<?php 
Class Controller extends AjaxController {

	public function init() {

		// validate user input
		$safe_data = Validator::validate($_POST);

		// if no errors, add new user to DB
		if (!$safe_data['error']) {
			$user = new User($safe_data);
			print_r($user);

		} else {

			// return bad values
			foreach ($safe_data as $key => $value) {
				$this->view[$key] = $value;
			}
		}

	}
	
}

$controller = new Controller();