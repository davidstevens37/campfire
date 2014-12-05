<?php 
Class Controller extends AppController {
	public function init() {

		
		/**
		 *	Comments
		 */

		// Get comments associated with event
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
		$member_results = UserEvent::get_members(1);

		if ($member_results->num_rows) {

			// Generate/render members in group
			while ($row = $member_results->fetch_assoc()) {
				$this->view->members .= MemberViewFrag::build($row);
			}
		}

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);
?>

<!-- Event Details / Quick Look -->
<div class="event-details">
	event details go here
</div>

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
</main><!-- /div.board -->