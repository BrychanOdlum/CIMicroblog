<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- Website designed and built by www.brychan.net-->
<html>
	<head>
		<title>Chirper</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/core.css") ?>">
	</head>
	<body>
			
		<?php include "navigation.php"; ?>
		
		<section>
			
			<div id="pagerNamer" class="<?= isset($pageColour) ? $pageColour : "blue" ?>">
				<h1>Chirper Login.</h1>
				<h2>Enter your Chirper account details.</h2>
				<?php if (isset($followUsername)) { ?>
					<a href="<?= base_url("user/follow/" . $followUsername) ?>">
						<button class="followButton">Follow</button>
					</a>
				<?php } ?>
			</div>
			
				
			<div id="login" class="widthContainer">
				
				<p>
					<?= isset($error) ? $error : "" ?>
				</p>
			
				<form action="<?= base_url() ?>user/doLogin" method="post">
					<input type="text" name="username" placeholder="Jack" autocomplete="off">
					<br>
					<input type="password" name="password" placeholder="Password" autocomplete="off">
					<br>
					<input type="submit">
				</form>
			
			</div>
			
		</section>
		
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="/assets/js/core.js"></script>
	</body>
</html>