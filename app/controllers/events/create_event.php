<?php 
Class Controller extends AppController {
	public function init() {

		if (!$user_id = Access::check()) {
			header('Location: /');
		}




	}
}
$controller = new Controller();
extract($controller->view->vars);
?>




<div class="create-event">
	<form>
		<h2>Create an Event</h2>
		<label>
			Event Name<br>
			<input name="event_name" type="text">
		</label>
		<label>
			Event Date/Time<br>
			<input name="date_time" type="date">
		</label>
		<label>
			<select name="theme_id">
				<option value="" default>-- SELECT A THEME --</option>
			</select>
		</label>
			<input name="longitude" type="text" hidden>
			<input name="lattitude" type="text" hidden>
		<button>Light the Fire</button>
	</form>
	<!-- map goes here -->
	<div id="map-canvas"></div>
</div>