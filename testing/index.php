<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Crimson+Text|Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/styles.css">







</head>
<body>
<header class="main-header">

	<div class="container">
		<a href="/" class="logo" title="">Camp<span>fire</span> <img src="/images/fire.png" alt=""></a>

		<div class="icons">
			<div class="profile-picture" style='background-image: url("/images/<?php echo $_SESSION['picture_id'] ?>.jpg")'></div>
			<div>
				<i class="fa fa-bell-o"></i>
				<div class="notifications">
					<header>
						<h2>Event Invitations</h2>
					</header>
				</div>
			</div>
			<div>
				<i class="fa fa-envelope-o"></i>
			</div>
			<div>
				<i class="fa fa-calendar-o"></i>
			</div>
		</div>

	</div>

	<nav>
		<!-- <a href="/">Home</a> -->
		<a href="/events">My Events</a>
		<a href="/create_event">Create Event</a>
		<a href="">link</a>

		<a href="/logout">Logout</a>

		<a href="/signup">Sign Up</a>
		<a href="/login">Login</a>

	</nav>
</header><!-- /header -->
	<div class="page">

		<div class="my-items">
			<header>
				<h2>Items I'm Bringing</h2>
			</header>
			<div class="items">	
				<h4>an item imtem im ttem im ttem im t taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>
				<h4>an item im taking</h4>

			</div>
		</div> 

	<!-- Group Members - Invitees // Attendees // Host -->
	<div class="other-member-items">
		<header>
			<h2>Claimed by Members</h2>
		</header>
		<div class="items">
			<h4>an item someone else is takingsomeone else is takingsomeone else is taking</h4>
			<h4>an item someone else is taking</h4>
			<h4>an item someone else is taking</h4>
			<h4>an item someone else is taking</h4>
			<h4>an item someone else is taking</h4>
			<h4>an item someone else is taking</h4>
			<h4>an item someone else is taking</h4>
			<h4>an item someone else is taking</h4>
		</div>
	</div>

	<!--  Main Event Board /unclaimed item-->
	<main class="board">
		<div class="new-item">
			<header>
				<h2>Add items to the list</h2>
			</header>
			<div>
				<textarea name="comment" data-event-id="<?php echo $event_id; ?>"></textarea>
				<button>Submit</button>
			</div>
		</div>
		<div class="unclaimed-items">
		<header>
			<h2>Unclaimed Items</h2>
		</header>
		<div>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
			<h4>unclaimed item</h4>
		</div>
	</div>
	</main><!-- /main.board -->

		

	</div><!-- /div.page -->
	<footer>
		<nav>
			<a href="">Contact us</a>
			<a href="">Privacy</a>
			<a href="">Terms &amp; Conditions</a>
			<a href="">Meet the team</a>
		</nav>
		<div>
			<a href="#" class="logo-footer" title="">Camp<span>fire</span> <img src="/images/fire.png" alt=""></a>
			<h5>Copyright &copy;2014 Campfire</h5>
		</div>
	</footer>
</body>
</html>

<!-- TESTING -->