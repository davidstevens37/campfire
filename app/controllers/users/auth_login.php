<?php 
Class Controller extends AjaxController {
	
	public function init() {

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = $_POST['username'];

			// $password = md5($_POST['password']);
			$password = $_POST['password'];
			
			if ($user_id = Access::login($username, $password)) {
				$this->view['user_id'] = $user_id;
			} else {
				$this->view['error'] = 'login failed';
			}
		}





	}
}
$controller = new Controller();
?>