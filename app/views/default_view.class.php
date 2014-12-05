<?php

/**
 * Default View
 */
class DefaultView extends View {
	public function __construct() {
		
		// Set Master Template for this View
		parent::__construct(ROOT . '/app/templates/master.php');
		
		// Make Sub Views
		$this->primary_header = new View(ROOT . '/app/templates/primary_header.php');
		$this->footer = new View(ROOT . '/app/templates/footer.php');
		
	}
}