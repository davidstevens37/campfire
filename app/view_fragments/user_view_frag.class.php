<?php 
Class UserViewFrag extends ViewFrag {

	protected $template = '
		<div class="user-not-invited" data-user-id="{{user_id}}">
			<div style="background-image: url(\'{{picture}}\');"></div>
			<div>
				<h3>{{first_name}} {{last_name}}</h3>
				<h5>{{status}}</h5>
			</div>
		</div>
	';
}
?>