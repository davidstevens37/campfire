<?php 
Class EventAlertViewFrag extends ViewFrag {

	protected $template = '	
		<div class="event-alert">
			<a href="event?event_id={{event_id}}"></a>
			<div class="actions">
				<button class="accept" data-event-id="{{event_id}}" data-member-status-id="2">I\'m There!</button>
				<button class="decline" data-event-id="{{event_id}}" data-member-status-id="4">No, Thanks</button>
			</div>
			<div class="picture" style="background-image: url(\'{{theme_picture}}\')"></div>
			<div class="info-alert">
				<h5>{{event_name}}</h5>
				<h6>{{theme_name}}</h6>
				<h5>{{date_time}}</h5>
			</div>
		</div>
	';

}
?>