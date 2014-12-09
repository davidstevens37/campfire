<?php 
Class Controller extends AppController {
	public function init() {

	}
}

$controller = new Controller();

extract($controller->view->vars);
?>


<div class="create-account">

	<div class="signup-logo">
		
		<a href="/" class="logo" title="">Camp<span>fire</span> <img src="/images/fire.png" alt="">
		</a>
			<h5>life is better by a campfire.</h5>
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
			<sup>Last</sup> <input name="last_name" placeholder="Last Name" type="text">
		</label>
		<label class="small">
			1<sup>st</sup> <input name="first_name" placeholder="First Name" type="text">
		</label>
		<label class="small">
			<i class="fa fa-birthday-cake"></i> <input name="age" placeholder="Age" type="number">
		</label>
		<label class="small">
			<i class="fa fa-map-marker"></i> <input name="zipcode" placeholder="Zipcode" type="number">
		</label>
		<div class="cf"></div>
		<button>Setup Camp</button>
		<p>By clicking "Start a Campfire" I agree to the <span>terms &amp; conditions</span>.</p>
	</form>
	<div class="alt-login">
		Already have an account? <a href="/login">Click here</a> to login.
	</div>

</div>