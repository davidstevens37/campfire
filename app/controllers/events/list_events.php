<?php 
Class Controller extends AppController {
	
	public function init() {


		//get events by user id
		$event_list_results = UserEvent::get_events(1);

		if ($event_list_results->num_rows) {
			
			while ($row = $event_list_results->fetch_assoc()) {
				$this->view->event_list .= EventListViewFrag::build($row);
			}
		}





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

	<div>
		<header>
			<h2>My Events</h2>
		</header>
		<div class="events">
			<?php echo $event_list; ?>
		</div>
	</div>
	

</main> <!-- /main.board -->