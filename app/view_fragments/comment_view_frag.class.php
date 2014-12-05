<?php 
Class CommentViewFrag extends ViewFrag {

	protected $template = '	
	<div class="comment">
		<header>
			<div></div> <h2>{{first_name}}</h2>
		</header>
		<p>{{comment}}</p>
	</div>
	';

}
?>