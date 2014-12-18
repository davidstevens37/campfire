<?php 
Class Controller extends AppController {
	
	public function init() {

		// check to make sure logged in
		if (!$user_id = Access::check() ) {
			$this->view->not_logged_in = true;
		} else {

			$event_id = $_GET['event_id'];

			if (!is_numeric($event_id)) {
				// TODO display message and die
				
			}

			Payload::Add('event_id', $event_id);

			/**
			 *	Event Details
			 */
			// if Get event successful
			if ($event_results = Event::get_event($event_id)) {

				if ($event_results['host_user_id'] == $user_id) {

					$this->view->event_details = EventDetailsViewFrag::build($event_results);
					
				}
			}

			/**
			 *	Users
			 */
			// if Get event successful
			if ($user_results = User::get_all_users($event_id)) {

				while ($row = $user_results->fetch_assoc()) {

					if ($row['status']) {

						$row['class'] = 'invited';

						$this->view->members .= MemberViewFrag::build($row);
						$this->view->users .= UserViewFrag::build($row);

					} else {

						$row['class'] = 'not-invited';
						$row['status'] = 'not invited';
						$this->view->users .= UserViewFrag::build($row);
						
					}

				}
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

	<!-- event info popout -->
	<?php echo $event_details; ?>

	<div class="group remove-users">
		<h2>Group Members</h2>
		<?php echo $members; ?>
	</div>


	<main class="board">
		<div>
			<header>
				<h2>Invite Users</h2>
			</header>
			<div class="invite-users">
				<?php echo $users ? : '<h4 class="no-items">(none)</h4>'; ?>
			</div>
		</div>
	</main> <!-- /main.board -->
<?php endif ?>


<script id="user" type="text/x-handlebars-template">
	<div class="{{class}}" data-user-id="{{user_id}}">
		<div style="{{picture}}"></div>
		<div>
			<h3>{{name}}</h3>
			<h5>{{status}}</h5>
		</div>
	</div>
</script>