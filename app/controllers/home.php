<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
	
	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view -->
