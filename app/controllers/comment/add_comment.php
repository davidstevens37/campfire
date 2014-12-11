<?php 
Class Controller extends AjaxController {
	
	public function init() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['user_id'] = Access::check()) {

			$data = Validator::validate($_POST);

			if (!$data['error']) {

				$comment_object = new Comment($data);

				$this->view['comment'] = $comment_object->get_comment();

			} else {
				$this->view['error'] = 'validation error';
			}
		}
	}
}

$controller = new Controller();