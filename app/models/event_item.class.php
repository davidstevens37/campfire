<?php 
Class EventItem extends Model {



	public static function get_event_items($event_id) {

		if (!is_numeric($event_id)) {
			return null;
		} 

		$sql = 'SELECT * FROM `event_item` WHERE event_id = ' . $event_id;

		$results = db::execute($sql);

		return $results;
		
	}

}

?>