<?php 
Class EventDetailsViewFrag extends ViewFrag {

	protected $template = '	
		<div class="event-details">
			<div style="background-image: url(\'/images/{{picture}}.jpg\')"></div>
			<div class="info">
				<h2>{{event_name}}</h2>
				<h5>{{theme_name}}</h5>
				<h4>{{date_time}}</h4>
			</div>
		</div>
	';

}
?>