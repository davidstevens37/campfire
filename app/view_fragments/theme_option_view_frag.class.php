<?php 
Class ThemeOptionViewFrag extends ViewFrag {

	protected $template = '	
		<option value="{{theme_id}}" data-picture="{{theme_picture}}">{{theme_name}}</option>
	';

}
?>