<header class="main-header">

	<div class="container">
		<a href="/" class="logo" title="">Camp<span>fire</span> <img src="/images/fire.png" alt=""></a>
<?php if ($user_id = Access::check()): ?>
		<div class="icons">
			<i class="fa fa-calendar-o"></i>
			<i class="fa fa-envelope-o"></i>
			<i class="fa fa-bell-o"></i>
			<div class="profile-picture" style='background-image: url("/images/<?php echo $_SESSION['picture_id'] ?>.jpg")'></div>
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