<?php 
Class Theme extends Model {



	public static function get_all_themes() {

		$sql = 
			'SELECT * FROM `theme`'
			;

		$results = db::execute($sql);

		return $results;
	}

}

?>