<?php 
Class Event extends Model {



	public static function insert($input) {


		$sql_values = [
			'event_name' => $input['event_name'],
			'theme_id' => $input['theme_id'],
			'date_time' => $input['date_time'],
			'longitude' => $input['longitude'],
			'lattitude' => $input['lattitude'],
			'host_user_id' => Access::check(),
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('event', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}


	// function returns the event datat from an event id
	public static function get_event($id) {

		if (!is_numeric($id)) {
			return null;
		} 

		$sql = 
			'SELECT * FROM `event`
			LEFT JOIN `theme` USING (theme_id)
			WHERE event_id = ' . $id .
			' LIMIT 1'
		;

		$results = db::execute($sql);

		return $results->num_rows ? $results->fetch_assoc() : null;
	}

}
