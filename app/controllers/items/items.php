<?php 
Class Controller extends AppController {
	public function init() {

		$event_id = $_GET['event_id'];

		// if event_id is not numeric, display error message else display event.
		if (!is_numeric($event_id)) {
			$this->view->view_event_error = '<div><p>OOPS, LOOKS LIKE THAT IT NOT A VALID EVENT</p><div>';
		} else {

			// assign event id to view's variable, and add it to the payload for JS to acesss the event id.
			$this->view->event_id = $event_id;
			Payload::Add('event_id', $event_id);

			// assign user id to view variable and to payload for JS to access it. (if user is logged in)
			if ($user_id = Access::check()) {
				$this->view->user_id = $user_id;
				Payload::Add('user_id', $user_id);
			}

			/**
			 *  Event Items
			 */
			// Get Event Items based on event id
			$event_item_results = EventItem::get_event_items($event_id);

			// if results return, loop over them and build event items and place them in appropriate category.
			if ($event_item_results->num_rows) {

				while ($event_item = $event_item_results->fetch_assoc()) {
					
					switch ($event_item['claimed_by']) {
						case null:
							$this->view->unclaimed_items .= EventItemViewFrag::build($event_item);
							break;
						case $user_id:
							$this->view->my_items .= EventItemSelfClaimedViewFrag::build($event_item);
							break;						
						default:
							$this->view->claimed_items .= EventItemClaimedViewFrag::build($event_item);
							break;
					}
				}
			}

			// set no items variable
			$this->view->no_items = '<h4 class="no-items">(none)</h4>';


		}

	}
}
$controller = new Controller();
extract($controller->view->vars);
?>

	<div class="my-items">
		<header>
			<h2>Items I'm Bringing</h2>
		</header>
		<div class="items">	
			<?php echo $my_items ? : $no_items; ?>
		</div>
	</div> 

	<!-- Group Members - Invitees // Attendees // Host -->
	<div class="other-member-items">
		<header>
			<h2>Already Claimed</h2>
		</header>
		<div class="items">
			<?php echo $claimed_items ? : $no_items; ?>
		</div>
	</div>

	<!--  Main Event Board /unclaimed item-->
	<main class="board">
		<div class="new-item">
			<header>
				<h2>Add items to the list</h2>
			</header>
			<div>
				<textarea class="add-item" placeholder="add an item here..." data-event-id="<?php echo $event_id; ?>"></textarea>
				<button>Submit</button>
			</div>
		</div>
		<div class="unclaimed-items">
		<header>
			<h2>Unclaimed Items</h2>
		</header>
		<div class="items">
			<?php echo $unclaimed_items ? : $no_items; ?>
		</div>
	</div>



<!-- handlebars templates -->
<script id="my-item" type="text/x-handlebars-template">
	<div class="item">
		<button class="self-remove" data-event-item-id="{{event_item_id}}">unclaim</button>
		<h4>{{name}}</h4>
	</div>
</script>

<script id="unclaimed-item" type="text/x-handlebars-template">
	<div class="item">
		<button class="group-remove" data-event-item-id="{{event_item_id}}">remove</button>
		<button class="claim" data-event-item-id="{{event_item_id}}">claim</button>
		<h4>{{name}}</h4>
	</div>
</script>
