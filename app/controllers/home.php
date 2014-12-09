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

	
<video autoplay loop muted>
	<source src="/videos/camping.mp4">
</video>