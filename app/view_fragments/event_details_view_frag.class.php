<?php 
Class EventDetailsViewFrag extends ViewFrag {

	protected $template;

	public function __construct() {

		$this->template = '	
		<div class="event-details">
			<div style="background-image: url(\'{{theme_picture}}\')"></div>
			<div class="info">
				<h2>{{event_name}}</h2>
				<h5>{{theme_name}}</h5>
				<h4>{{date_time}}</h4>
			</div>
			<button class="packing-list">Packing List</button><br>
			<a href="https://www.google.com/maps/dir/' . $_SESSION['zipcode'] . '/{{lattitude}}, {{longitude}}"><button>Directions</button></a>
		</div> 
	';
	}

}
?>