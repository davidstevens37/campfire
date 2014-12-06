<?php 
Class CommentViewFrag extends ViewFrag {

	protected $template = '	
	<div class="comment">
		<header>
			<div style="background-image: url(\'/images/{{picture}}.jpg\');"></div> <h2>{{first_name}}</h2>
		</header>
		<p>{{comment}}</p>
	</div>
	';

}
?>