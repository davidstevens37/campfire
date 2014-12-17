<?php 
/**
 *  Remove Member End Point
 */
Class Controller extends AjaxController {
	public function init() {

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && Access::check()) {
			
			// $data = Validator::validate($_POST);
			$data = $_POST;

			if (!$data['error']) {
				
				$results = UserEvent::remove($data);

				$this->view = $results;
				
			} else {
				$this->view['error'] = $data;
			}

		}

	}
}

$controller = new Controller();
?>