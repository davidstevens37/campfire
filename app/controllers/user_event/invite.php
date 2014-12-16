<?php 
Class Controller extends AppController {
	public function init() {

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {
			
			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {
				
				// takes user_id and event_id
				$user_event = new UserEvent($data);
				
			}

		}

	}
}

$controller = new Controller();
?>