<?php 
Class EventItem extends Model {


	protected function insert($data) {

		$sql_values = [
			'name' => $data['name'],
			'event_id' => $data['event_id']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('event_item', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}


	public static function get_event_items($event_id) {

		if (!is_numeric($event_id)) {
			return null;
		} 

		$sql = 'SELECT * FROM `event_item` WHERE event_id = ' . $event_id;

		$results = db::execute($sql);

		return $results;
		
	}

	public static function change_claim($event_item_id, $claimed_by=null) {

		// ensures event item id is numeric
		if (!is_numeric($event_item_id)) {
			return null;
		}

		//  ensures claimed by is numeric if given.
		if ($claimed_by) {
			if (!is_numeric($claimed_by)) {
				return null;
			}
		}

		$sql_values = ['claimed_by' => $claimed_by];

		$sql_where = ' WHERE event_item_id = ' . $event_item_id;

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		return db::update('event_item', $sql_values, $sql_where);

	}


	public static function remove($event_item_id) {
		
		if (!is_numeric($event_item_id)) {
			return null;
		}

		$sql = 'DELETE FROM `event_item` WHERE event_item_id = ' . $event_item_id;

		$results = db::execute($sql);

		return $results;

	}



	public static function get_self_claimed_items($event_id, $user_id) {

		if (!is_numeric($event_id) || !is_numeric($user_id)) {
			return null;
		}

		$sql = 'SELECT * FROM `event_item` WHERE event_id = ' . $event_id . ' AND claimed_by = ' . $user_id;

		$results = db::execute($sql);

		return $results;
	}


	public static function stock_items($event_id, $theme_id) {

		// print_r('test');

		if (!is_numeric($event_id) || !is_numeric($theme_id)) {
			return null;
		}

		$sql = "INSERT INTO event_item (name, event_id) select item_name, $event_id FROM theme_item LEFT JOIN item USING (item_id) WHERE theme_id = $theme_id";
		// print_r($sql);

		$results = db::execute($sql);

		return $results;

	}

}

?>