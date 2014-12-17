<?php 
Class HostEventDetailsViewFrag extends ViewFrag {

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
			<button class="invite">Invite</button>
			<button class="packing-list">Packing List</button>
			<a href="https://www.google.com/maps/dir/' . $_SESSION['zipcode'] . '/{{lattitude}}, {{longitude}}"><button>Directions</button></a>
		</div> 
	';
	}

}
?>