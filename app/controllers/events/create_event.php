<?php 
Class Controller extends AppController {
	public function init() {

		if (!$user_id = Access::check()) {
			header('Location: /login');
		} else {

			$theme_results = Theme::get_all_themes();

			if ($theme_results->num_rows) {
				while ($row = $theme_results->fetch_assoc()) {
					$this->view->theme_options .= ThemeOptionViewFrag::build($row);
				}
			}

		}




	}
}
$controller = new Controller();
extract($controller->view->vars);
?>




<div class="create-event">
	<form>
		<h2>Create an Event</h2>
		<div class="event-picture" style="background-image: url('/images/theme/realfire.jpg');"></div>

		<label>
			Event Name<br>
			<input name="event_name" type="text" required>
		</label>
		<label>
			Event Date/Time<br>
			<input name="date_time" type="datetime-local" required>
		</label>
		<label>
			<select name="theme_id" required>
				<option default>-- SELECT A THEME --</option>
				<?php echo $theme_options; ?>
			</select>
		</label>
			<input class="lng" name="longitude" type="text" hidden>
			<input class="lat" name="lattitude" type="text" hidden>
		<button>Light the Fire</button>
	</form>
	<!-- map goes here -->
	<div id="map-canvas"></div>
</div>