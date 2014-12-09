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
			<h2>Login</h2>
			<h5>Welcome back</h5>
		</div>
		<label>
			<i class="fa fa-user"></i> <input name="username" placeholder="Username" type="text">
		</label>
		<label>
			<i class="fa fa-lock"></i> <input name="password" placeholder="Password" type="password">
		</label>
		<button>Start a fire</button>
	</form>
	<div class="alt-login">
		Don't have an account? <a href="/signup">Click here </a>to sign up.
	</div>

</div>