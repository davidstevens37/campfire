<?php 
Class Controller extends AppController {
	public function init() {

		
		/**
		 *	Comments
		 */

		// Get comments from event_id
		$comment_results = Comment::get_comments(1);

		// if results are generated
		if ($comment_results->num_rows) {

			// loop over results and render view per resutls
			while($row = $comment_results->fetch_assoc()) { 
				$this->view->comments .= CommentViewFrag::build($row);
			}
		}


		/**
		 *	Group Members
		 */

		// Get event members
		$user_event_results = UserEvent::get_members(1);

		if ($user_event_results->num_rows) {

			// Generate/render members in group
			while ($row = $user_event_results->fetch_assoc()) {
				$this->view->members .= MemberViewFrag::build($row);
			}

			// move incrementer back to 1st record
			$user_event_results->data_seek(0);

			$row = $user_event_results->fetch_assoc();
			
			$this->view->event_details = EventDetailsViewFrag::build($row);
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
			<textarea name="comment"></textarea>
			<button>Submit</button>
		</div>
	</div>
	<?php echo $comments; ?>
</main><!-- /main.board -->