<?php 


/**
 *	View Event Controller 
 */
Class Controller extends AppController {
	public function init() {

		$user_id = Access::check();

		$event_id = $_GET['event_id'];



		// if event_id is not numeric, display error message else display event.
		if (!is_numeric($event_id)) {
			$this->view->view_event_error = '<div><p>OOPS, LOOKS LIKE THAT IT NOT A VALID EVENT</p><div>';
		} else {

			// assign event id to view's variable, and add it to the payload for JS to acesss the event id.
			$this->view->event_id = $event_id;
			Payload::Add('event_id', $event_id);


			/**
			 *	Event Details
			 */

			// if Get event successful
			if ($event_results = Event::get_event($event_id)) {

				// Generate/render event details
				$this->view->event_details = EventDetailsViewFrag::build($event_results);

				// Set event description . if null, set default
				$this->view->event_description = $event_results['description'] ? : 'Click here to edit the description.';

				if ($event_results['host_user_id'] == Access::check()) {
					$this->view->edditable = 'contenteditable';
				}
			}


			/**
			 *	Comments
			 */
			
			// Get comments from event_id
			$comment_results = Comment::get_comments($event_id);

			// if results are generated
			if ($comment_results->num_rows) {

				// loop over results and render view per resutls
				while($row = $comment_results->fetch_assoc()) { 
					if ($row['user_id'] == $user_id) {
						$this->view->comments .= SelfCommentViewFrag::build($row);
					} else {
						$this->view->comments .= CommentViewFrag::build($row);
					}
				}
			}


			/**
			 *	group members
			 */

			// Get event members
			$user_event_results = UserEvent::get_members($event_id);

			if ($user_event_results->num_rows) {

				// Generate/render members in group
				while ($row = $user_event_results->fetch_assoc()) {
					$this->view->members .= MemberViewFrag::build($row);
				}

			}

			/**
			 *  Users
			 */
			// get all users
			$user_results = User::get_all_users();

			if ($user_results->num_rows) {
				
				while ($row = $user_results->fetch_assoc()) {
					$this->view->users .= UserViewFrag::build($row);
				}
			}
		}
	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);
?>


<?php if ($view_event_error): ?>

	<?php echo $view_event_error ?>
	

<?php else: ?>

	<!-- Event Details / Quick Look -->

	<?php echo $event_details; ?>

		<input class="invite" list="users" type="text">
		<datalist id="users">
			<?php echo $users ?>
		</datalist>


	<!-- Group Members - Invitees // Attendees // Host -->
	<div class="group">
		<h2>Group Members</h2>
		<?php echo $members; ?>
	</div>

	<!--  Main Event Board // Comments -->
	<main class="board">
		<div class="bulletin">
			<header>
				<h2>Bulletin Board</h2>
			</header>
			<p data-event-id="<?php echo $event_id; ?>" <?= $edditable ?>>
				<?php echo $event_description ?>
			</p>
		</div>
		<div class="new-comment">
			<header>
				<h2>Comment Board</h2>
			</header>
			<div>
				<textarea name="comment" placeholder="Click here to post a comment." data-event-id="<?php echo $event_id; ?>"></textarea>
				<button>Submit</button>
			</div>
		</div>
		<?php echo $comments; ?>
	</main><!-- /main.board -->


<?php endif ?>
