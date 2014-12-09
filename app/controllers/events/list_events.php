<?php 
Class Controller extends AppController {
	
	public function init() {

		
// ;		if ($user_id = Access::check()) {
			$user_id = 1;
			//get events by user_id
			$user_event_results = UserEvent::get_events($user_id);

			// if results are generated
			if ($user_event_results->num_rows) {
				
				// loop over results and render evnet lists
				while ($row = $user_event_results->fetch_assoc()) {

					switch ($row['status']) {
						case 'hosting':
							$this->view->events_hosting .= EventListViewFrag::build($row);
							break;
						case 'invited':
							$this->view->events_invited .= EventListViewFrag::build($row);
							break;
						case 'attending':
							$this->view->events_attending .= EventListViewFrag::build($row);
							break;
						case 'not attending':
							$this->view->events_not_attending .= EventListViewFrag::build($row);
							break;
						
					}
					
				}
			}
		// }
	}
}
$controller = new Controller();

extract($controller->view->vars);
?>



<div class="user">
	<div style="background-image: url('/images/1.jpg')"></div>
	<div class="info">
		<h2>User Name</h2>
		<h5>Participating in 5 events</h5>
		<h4>next event</h4>
	</div>
</div>


<main class="board events">

<!-- If cases to not display event catagories that user does not contain events in  -->

<?php if ($events_hosting): ?>
	<div>
		<header>
			<h2>Hosting</h2>
		</header>
		<div class="events">
			<?php echo $events_hosting; ?>
		</div>
	</div>
<?php endif ?>

<?php if ($events_attending): ?>
	<div>
		<header>
			<h2>Attending</h2>
		</header>
		<div class="events">
			<?php echo $events_attending; ?>
		</div>
	</div>
<?php endif ?>

<?php if ($events_invited): ?>
	<div>
		<header>
			<h2>Invited</h2>
		</header>
		<div class="events">
			<?php echo $events_invited; ?>
		</div>
	</div>
<?php endif ?>

<?php if ($events_not_attending): ?>
	<div>
		<header>
			<h2>Not Attending</h2>
		</header>
		<div class="events">
			<?php echo $events_not_attending; ?>
		</div>
	</div>
<?php endif ?>


<!-- If no events, display no events found message. -->
<?php if (!$events_hosting && !$events_attending && !$events_invited && !$events_not_attending): ?>
	<div>
		<header>
			<h2>No Events</h2>
		</header>
		<div class="events">
			<h4>Try hosting an event! We've already taken care of all the stuff that would normally give you a headache.</h4>
		</div>
	</div>
<?php endif ?>

	

</main> <!-- /main.board -->