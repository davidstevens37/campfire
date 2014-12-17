<?php 
Class UserEvent extends Model {



	public static function insert($input) {

		//member status 3 = invited
		$sql_values = [
			'event_id' => $input['event_id'],
			'user_id' => $input['user_id'],
			'member_status_id' => 3,
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('user_event', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}


	// sets host access when creating an event
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


	public static function remove($input) {

		$sql_values = [
			'event_id' => $input['event_id'],
			'user_id' => $input['user_id'],
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		$sql = "DELETE FROM `user_event` WHERE user_id = {$sql_values['user_id']} AND event_id = {$sql_values['event_id']}";

		return db::execute($sql) ? $sql_values : null;
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
					LEFT JOIN `event` USING (event_id)  
					WHERE user_id = ' . $user_id . ' AND date_time > NOW()
				) AS event_count,
				(SELECT MIN(date_time) 
					FROM user_event 
					LEFT JOIN `event` USING (event_id) 
					WHERE member_status_id IN (1,2)
					AND user_id = ' . $user_id . ' AND date_time > NOW()
				) AS next_event,
			NOW() AS now,
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


	public static function get_invites($user_id) {

		if (!is_numeric($user_id)) {
			return null;
		}

		$sql = 
			'SELECT *
			FROM `user` 
			LEFT JOIN `user_event` USING (user_id)
			LEFT JOIN `member_status` USING (member_status_id)
			LEFT JOIN `event` USING (event_id)
			LEFT JOIN `theme` USING (theme_id)
			WHERE date_time > NOW() AND member_status_id = 3 AND user_id = ' . $user_id
			;

		$results = db::execute($sql);

		return $results;
	}

	public static function change_status($event_id, $status) {

		// ensures event id is numeric
		if (!is_numeric($event_id)) {
			return null;
		}

		//  ensures claimed by is numeric if given
		if (!is_numeric($status)) {
			return null;
		}
		

		$sql_values = ['member_status_id' => $status];

		$sql_where = ' WHERE event_id = ' . $event_id . ' AND user_id = ' . Access::check();

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		return db::update('user_event', $sql_values, $sql_where);

	}

}

?>