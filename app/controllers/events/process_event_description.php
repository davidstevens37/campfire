<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {

			// $data = Validator::validate($_POST);

			$data = $_POST;

			$event_id = $data['event_id'];

			if ($event = Event::get_event($event_id)) {
				$host = $event['host_user_id'];
			}

			if (!$data['error'] && $host == Access::check()) {
				Event::update_description($event_id, $data['description']);

			} else {


			}
		}
	}
}

$controller = new Controller();