<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['user_id'] = Access::check()) {

			$data = Validator::validate($_POST);

			if (!$data['error']) {

				

			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();