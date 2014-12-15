<?php 
Class UserViewFrag extends ViewFrag {

	protected $template = '	
		<option value="{{username}}">{{first_name}} {{last_name}}</option>
	';

}
?>