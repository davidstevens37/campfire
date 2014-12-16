<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {

			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {

				// name and event id
				$item = new EventItem($data);

				$this->view['event_item_id'] = $item->event_item_id;

				
			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();