<?php 
Class Comment extends Model {



	protected function insert($data) {

		$sql_values = [
			'user_id' => $data['user_id'],
			'event_id' => $data['event_id'],
			'comment' => $data['comment']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('comment', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	public static function get_comments($event_id) {

		if (!is_numeric($event_id)) {
			return null;
		}
		
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

	public function get_comment(){
		return $this->comment;
	}
}

?>