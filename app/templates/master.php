<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />

	<title>Page Title</title>
	
	<!-- Font Imports -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crimson+Text|Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="/bower_components/ReptileForms/dist/reptileforms.min.css">
	<link rel="stylesheet" href="/css/styles.css">

	<!-- Modernizr -->
	<script src="/bower_components/modernizr/modernizr.js"></script>
</head>
<body>

	<?php echo $primary_header; ?>
	<div class="page">
		<?php echo $main_content; ?>
	</div>
	<?php echo $footer; ?>

	<!-- Include Common Scripts -->
	<script src="/bower_components/jquery/dist/jquery.js"></script>
	<!-- <script src="/bower_components/ReptileForms/dist/reptileforms.js"></script> -->

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	
	<!-- Main JS -->
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC8H7EJxBW4ii4z77yT_PaYtcJe-s56n8o"></script>
	<script src="/bower_components/handlebars/handlebars.min.js"></script>
	<script src="/js/main.js"></script>

</body>
</html>