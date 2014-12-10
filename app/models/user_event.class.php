<?php 
Class UserEvent extends Model {

	// Gets members associated with event and event details by event_id
	public static function get_members($event_id) {

		$sql = 
			'SELECT * FROM `user_event` 
			LEFT JOIN `user` USING (user_id)
			LEFT JOIN `member_status` USING (member_status_id)
			LEFT JOIN `picture` USING (picture_id)
			LEFT JOIN `event` USING (event_id)
			LEFT JOIN `theme` USING (theme_id)
			WHERE event_id = ' . $event_id
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
					WHERE user_id = ' . $user_id . '
				) AS next_event
			FROM `user` 
			LEFT JOIN `user_event` USING (user_id)
			LEFT JOIN `member_status` USING (member_status_id)
			LEFT JOIN `picture` USING (picture_id)
			LEFT JOIN `event` USING (event_id)
			LEFT JOIN `theme` USING (theme_id)
			WHERE user_id = ' . $user_id
		;

		$results = db::execute($sql);

		return $results;
	}
}

?>