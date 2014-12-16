<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {

			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {

				$this->view = EventItem::remove($data['event_item_id']);

			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();