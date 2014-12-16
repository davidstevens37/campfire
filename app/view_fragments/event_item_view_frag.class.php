<?php 
Class EventItemViewFrag extends ViewFrag {

	protected $template = '	
		<div class="item">
			<button class="group-remove" data-event-item-id="{{event_item_id}}">remove</button>
			<button class="claim" data-event-item-id="{{event_item_id}}">claim</button>
			<h4>{{name}}</h4>
		</div>
	';

}
?>