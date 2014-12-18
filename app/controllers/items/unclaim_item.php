<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['user_id'] = Access::check()) {

			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {

				if ($data['unclaim'] == 'all') {

					$results = EventItem::unclaim_all($data['event_id'], $data['removed_user_id']);

				} else {

					EventItem::change_claim($data['event_item_id']);
				}


			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();