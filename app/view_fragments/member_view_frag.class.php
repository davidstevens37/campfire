<?php 
Class MemberViewFrag extends ViewFrag {

	protected $template = '
		<div class="member">
			<div style="background-image: url(\'/images/{{picture}}.jpg\');"></div>
			<div>
				<h3>{{first_name}} {{last_name}}</h3>
				<h5>{{status}}</h5>
			</div>
		</div>
	';
}
?>