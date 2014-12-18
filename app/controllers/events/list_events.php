<?php 
Class Controller extends AppController {
	
	public function init() {

		// check to make sure logged in
		if (!$user_id = Access::check()) {
			$this->view->not_logged_in = true;
		} else {
	
			//get events by user_id
			$user_event_results = UserEvent::get_events($user_id);

			// if results are generated
			if ($user_event_results->num_rows) {

				// fetch row to build user data
				$row = $user_event_results->fetch_assoc();

				//if next ext event is null, replace with n/a
				$row['next_event'] = $row['next_event'] ? : 'n/a';

				//build user data
				$this->view->user_info = UserInfoViewFrag::build($row);

				// return to 1st record.
				$user_event_results->data_seek(0);

				// loop over results and render evnet lists based on their status
				while ($row = $user_event_results->fetch_assoc()) {

					// if event is past, place it into the past events catagory
					if ($row['date_time'] && $row['date_time'] < $row['now']) {
						$this->view->events_past .= EventListViewFrag::build($row);
					} else {

						// present events 
						switch ($this->view->event_present = $row['status']) {
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

				$this->view->events = [
					'Hosting' => $this->view->events_hosting,
					'Invited' => $this->view->events_invited,
					'Attending' => $this->view->events_attending,
					'Not Attending' => $this->view->events_not_attending,
					'Past Events' => $this->view->events_past
				];
				
				
			}
		}
	}
}
$controller = new Controller();

extract($controller->view->vars);
?>


<!-- If not logged in, display message, else display content -->
<?php if ($not_logged_in): ?>
	 <?php header('Location: /login') ?>
<?php else: ?>

	<!-- User info popout -->
	<?php echo $user_info; ?>

	<main class="board events">

	<?php if ($event_present || $events_past): ?>  <!-- if event is present -->

		<!-- loop over events array and display data if present -->
		<?php foreach ($events as $key => $value) { ?>

			<?php if ($value): ?>
				<div>
					<header>
						<h2><?php echo $key ?></h2>
					</header>
					<div class="events">
						<?php echo $value; ?>
					</div>
				</div>
			<?php endif ?>

		<?php } ?>  <!-- end loop -->

	<?php else: ?><!-- If no events, display no events found message. -->
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
<?php endif ?>
