<?php 
Class EventItemSelfClaimedViewFrag extends ViewFrag {

	protected $template = '	
		<div class="item">
			<button class="self-remove" data-event-item-id="{{event_item_id}}">unclaim</button>
			<h4>{{name}}</h4>
		</div>
	';

}
?>