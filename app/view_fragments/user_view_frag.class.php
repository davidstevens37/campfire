<?php 
Class UserViewFrag extends ViewFrag {

	protected $template = '
		<div class="user">
			<div style="background-image: url(\'/images/{{picture}}.jpg\')"></div>
			<div class="info">
				<h2>{{username}}</h2>
				<h5>Participating in {{event_count}} events</h5>
				<h4>Next Event:<br>{{next_event}}</h4>
			</div>
		</div>
	';
}
?>