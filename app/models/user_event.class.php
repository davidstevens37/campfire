<?php 
Class UserEvent extends Model {



	public static function insert($input) {


		$sql_values = [
			'event_id' => $input['event_id'],
			'member_status_id' => 1,
			'user_id' => Access::check(),
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('user_event', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}



	public static function host_event($event_id) {


		$sql_values = [
			'event_id' => $event_id,
			'member_status_id' => 1,
			'user_id' => Access::check(),
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		return db::insert('user_event', $sql_values) ? $sql_values : null; 

	}




	// Gets members associated with event and event details by event_id
	public static function get_members($event_id) {

		$sql = 
			'SELECT * FROM `user_event` 
			LEFT JOIN `user` USING (user_id)
			LEFT JOIN `member_status` USING (member_status_id)
			LEFT JOIN `picture` USING (picture_id)
			WHERE event_id = ' . $event_id . '
			order by member_status_id'
			;

		$results = db::execute($sql);

		return $results;
	}

	// Gets events a user is associated with by user_id
	public static function get_events($user_id) {

		$sql = 
			'SELECT *, 
				(SELECT COUNT(event_id) 
					FROM user_event 
					WHERE user_id = ' . $user_id . '
				) AS event_count,
				(SELECT MIN(date_time) 
					FROM user_event 
					LEFT JOIN `event` USING (event_id) 
					WHERE member_status_id IN (1,2)
					AND user_id = ' . $user_id . ' AND date_time > NOW()
				) AS next_event,
			up.picture AS user_picture
			FROM `user` 
			LEFT JOIN `user_event` USING (user_id)
			LEFT JOIN `member_status` USING (member_status_id)
			LEFT JOIN `picture` up ON up.picture_id = user.picture_id
			LEFT JOIN `event` USING (event_id)
			LEFT JOIN `theme` USING (theme_id)
			WHERE user_id = ' . $user_id
		;

		$results = db::execute($sql);

		return $results;
	}

}

?>