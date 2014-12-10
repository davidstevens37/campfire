<?php 
Class EventListViewFrag extends ViewFrag {

	protected $template = '	
		<div class="event">
			<div style="background-image: url(\'{{event_picture}}\')"></div>
			<div class="info">
				<h2>{{event_name}}</h2>
				<h5>{{theme_name}}</h5>
				<h4>{{date_time}}</h4>
			</div>
			<h5>event description</h5>
			<a href="event?event_id={{event_id}}"></a>
		</div>
	';

}
?>