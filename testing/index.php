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
			<a href="#" class="logo" title="">Camp<span>fire</span> <img src="/images/1.jpg" alt=""></a>
			<div class="profile-picture"></div>
		</div>
		<nav>
			<a href="">Home</a>
			<a href="">Create Event</a>
			<a href="">link</a>
			<a href="">link</a>
			<a href="">link</a>
		</nav>
	</header><!-- /header -->
	<div class="page">



		<style>


			.create-account {
				background-color: #2D3645;
				padding-top: 150px;
				position: fixed;
				top: 0;
				right: 0;
				left: 0;
				bottom: 0;

			}
			.create-account form {
				width: 300px;
				background-color: white;
				padding: 20px;
				overflow: hidden;
				margin: auto;
				margin-top: 25px;
			}

			.create-account form > * + * {
				margin-top: 15px;
			}

			.create-account button {
				border-radius: 3px;
				background-color: orange;
				width: 260px;
				color: white;
				border: none;
				margin: auto;
				display: block;
				margin-top: 15px;
				padding: 10px;
			}
			
			div.cf {
				clear: both;
				content: "";
				overflow: hidden;
			}
			label {
				display: block;
				position: relative;
				width: 260px;				
				height: 40px;
				padding: 8px;

			}


			label.small {
				width: 125px;
				display: inline-block;			
			}

			.small:nth-child(even) {
				float: right;
			}	
			.small:nth-child(odd) {
				float: left;
			}




			input {
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				width: 100%;
				font-size: 12pt;
				padding-left: 45px;
				border-radius: 3px;
				border: 1px solid lightgray;
				background-color: transparent;
			}
			

			.greeting {
				width: 260px;
				margin: auto;
				text-align: center;
			}
			

			.signup-logo {
				position: relative;
				width: 300px;
				margin: auto;
				min-height: 50px;
				text-align: center;
				color: #696D75;
			}
			.signup-logo .logo {
				position: initial;
			}

			.create-account {
				color: #696D75;
			}


		</style>

		<div class="create-account">

			<div class="signup-logo">
				
				<a href="#" class="logo" title="">Camp<span>fire</span> <img src="/images/fire.png" alt="">
				</a>
					<h5>life is better around a campfire.</h5>
			</div>
			

			<form>
				<div class="greeting">
					<h2>Get Started</h2>
					<h5>It'll only take a minute</h5>
				</div>

				<label>
					<i class="fa fa-user"></i> <input name="username" placeholder="Username" type="text">
				</label>
				<label>
					<i class="fa fa-lock"></i> <input name="password" placeholder="Password" type="password">
				</label>
				<label>
					<i class="fa fa-envelope-o"></i> <input name="email" placeholder="Email Address" type="email">
				</label>
				<label>
					<i class="fa fa-phone"></i> <input name="phone" placeholder="Mobile Number (optional)" type="tel">
				</label>
				<label class="small">
					LA<sup>st</sup> <input name="last_name" placeholder="Last Name" type="text">
				</label>
				<label class="small">
					1<sup>st</sup> <input name="first_name" placeholder="First Name" type="text">
				</label>
				<label class="small">
					<i class="fa fa-birthday-cake"></i> <input name="dob" placeholder="Birthdate" type="date">
				</label>
				<label class="small">
					<i class="fa fa-map-marker"></i> <input name="zip" placeholder="Zipcode" type="number">
				</label>
				<div class="cf"></div>
				<button>Start a Campfire</button>
			</form>

		</div>

		

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