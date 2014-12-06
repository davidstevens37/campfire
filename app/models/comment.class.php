<?php 
Class Comment extends Model {

	public static function get_comments($event_id) {

		$sql = 
			'SELECT * FROM `comment` 
			LEFT JOIN `user` USING (user_id)
			LEFT JOIN `picture` USING (picture_id)
			WHERE event_id = ' . $event_id . '
			ORDER BY `datetime_added` DESC'
			;

		$results = db::execute($sql);

		return $results;
	}
}

?>