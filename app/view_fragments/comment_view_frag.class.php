<?php 
Class CommentViewFrag extends ViewFrag {

	protected $template = '	
	<div class="comment">
		<header>
			<div style="background-image: url(\'{{picture}}\');"></div> 
			<div class="comment-action">
				<span>{{datetime_added}}</span>
			</div>
			<h2>{{first_name}}</h2>
		</header>
		<p>{{comment}}</p>
	</div>
	';

}
?>