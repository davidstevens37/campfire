<?php 
Class UserEvent extends Model {

	public static function get_members($event_id) {

		$sql = 
			'SELECT * FROM `user_event` 
			LEFT JOIN `user` USING (user_id)
			LEFT JOIN `member_status` USING (member_status_id)
			WHERE event_id = ' . $event_id
			;

		$results = db::execute($sql);

		return $results;
	}
}

?>