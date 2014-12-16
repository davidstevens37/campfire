<?php 

Abstract Class AlertHelper {

	public static $notifications;



	public static function get_notifications() {

		if ($user_id = Access::check()) {

			$event_notifications = UserEvent::get_invites($user_id);

			if (self::$notifications = $event_notifications->num_rows) {
				while ($event = $event_notifications->fetch_assoc()) {
					$event_alerts .= EventAlertViewFrag::build($event);
				}
			} else {
				$event_alerts = '<h4 class="no-items">(none)</h4>';
			}

			return $event_alerts;
		} else {
			return null;
		}





	}


}