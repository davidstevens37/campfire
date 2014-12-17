<?php 
Class Controller extends AjaxController {
	public function init() {

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {
			
			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {
				
				// takes user_id and event_id
				$user_event = new UserEvent($data);
				
			} else {
				$this->view['error'] = $data;
			}

		}

	}
}

$controller = new Controller();
?>