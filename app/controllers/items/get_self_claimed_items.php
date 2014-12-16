<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $user_id = Access::check()) {

			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {

				$results = EventItem::get_self_claimed_items($data['event_id'], $user_id);

				if ($results->num_rows) {

					$results_array = [];
					$i = 0;

					while ($row = $results->fetch_assoc()) {
						$results_array[$i] = $row;
						$i++;
					}

					$this->view = $results_array;

				}



			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();