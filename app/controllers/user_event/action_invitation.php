<?php 
Class Controller extends AjaxController {
	public function init() {

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {
			
			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {
				
				// takes user_id and event_id
				$results = UserEvent::change_status($data['event_id'], $data['member_status_id']);

			} else {
				$this->view['error'] = $data['error'];
			}

		}

	}
}

$controller = new Controller();
?>