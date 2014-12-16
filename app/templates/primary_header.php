<?php 
/**
 *  Header Template
 */
//  If user is logged in, get notifications
$event_alerts = ($user_id = Access::check()) ? AlertHelper::get_notifications() : null ; 

$alert = AlertHelper::$notifications ? 'alert' : null;

// $num_alerts = AlertHelper::$notifications ? : null;
// $alert = $num_alerts ? 'alert' : null;
?>

<header class="main-header">

	<div class="container">
		<a href="/" class="logo" title="">Camp<span>fire</span> <img src="/images/fire.png" alt=""></a>
<?php if ($user_id): ?>
		<div class="icons">
			<div class="profile-picture" style='background-image: url("/images/<?php echo $_SESSION['picture_id'] ?>.jpg")'></div>
			<div>
				<i class="fa fa-bell-o notification-indicator <?php echo $alert ?>"></i>
				<div class="notifications">
					<header>
						<h2>Event Invitations</h2>
					</header>
					<div class="events">
						<?php echo $event_alerts; ?>
					</div>
				</div>
			</div>
			<div>
				<i class="fa fa-envelope-o"></i>
			</div>
			<div>
				<i class="fa fa-calendar-o"></i>
			</div>
		</div>
<?php endif ?>
	</div>

	<nav>
		<!-- <a href="/">Home</a> -->
		<a href="/events">My Events</a>
		<a href="/create_event">Create Event</a>
		<a href="">link</a>
<?php if ($user_id): ?>
		<a href="/logout">Logout</a>
<?php else: ?>
		<a href="/signup">Sign Up</a>
		<a href="/login">Login</a>
<?php endif ?>
	</nav>
</header><!-- /header -->