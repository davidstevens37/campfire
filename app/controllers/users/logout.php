<?php 
Class Controller extends AppController {

	public function init() {

		Access::logout();

		header('Location: /');
	}
}
$controller = new Controller();
?>