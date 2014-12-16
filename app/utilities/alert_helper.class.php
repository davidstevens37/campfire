<?php 

Class AlertHelper {

	public static function get_notifications() {

		if ($user_id = Access::check()) {

			$event_notifications = UserEvent::get_invites($user_id);

			if ($event_notifications->num_rows) {
				while ($event = $event_notifications->fetch_assoc()) {
					$event_alerts .= EventAlertViewFrag::build($event);
				}
			} else {
				$event_alerts = '<p class="no-notifications">(none)</p>';
			}

			return $event_alerts;
		} else {
			return null;
		}










	}


}