<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['user_id'] = Access::check()) {

			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {

				$event_object = new Event($data);

				if ($result = UserEvent::host_event($event_object->event_id)) {
					$this->view['userEvent'] = $result;
				} else {
					$this->view['error'] = 'problem entering into user_event';
				}

				$this->view['event'] = Event::get_event($event_object->event_id);

			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();