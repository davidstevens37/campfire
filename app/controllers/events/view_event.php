<?php 
Class Controller extends AppController {
	public function init() {

		$event_id = $_GET['event_id'];
		$this->view->event_id = $event_id;

		/**
		 *	Comments
		 */
		
		// Get comments from event_id
		$comment_results = Comment::get_comments($event_id);

		// if results are generated
		if ($comment_results->num_rows) {

			// loop over results and render view per resutls
			while($row = $comment_results->fetch_assoc()) { 
				$this->view->comments .= CommentViewFrag::build($row);
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
		 *	Event Details
		 */

		// if Get event successful
		if ($event_results = Event::get_event($event_id)) {

			// Generate/render event details
			$this->view->event_details .= EventDetailsViewFrag::build($event_results);
		}
		

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);
?>

<!-- Event Details / Quick Look -->
<?php echo $event_details; ?>

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
		<p>
			this is the bulletin board
		</p>
	</div>
	<div class="new-comment">
		<header>
			<h2>Comment Board</h2>
		</header>
		<div>
			<textarea name="comment" data-event-id="<?php echo $event_id; ?>"></textarea>
			<button>Submit</button>
		</div>
	</div>
	<?php echo $comments; ?>
</main><!-- /main.board -->