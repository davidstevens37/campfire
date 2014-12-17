<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $user_id = Access::check()) {

			$data = Validator::validate($_POST);


			if (!$data['error']) {


				$this->view['test'] = Comment::delete($data['comment_id'], $user_id);

			} else {
				$this->view['error'] = $data;
			}
		}
	}
}

$controller = new Controller();