<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v3.8.5">
		<title>Floating labels example · Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>
		<!-- Custom styles for this template -->
		<link href="https://getbootstrap.com/docs/4.2/examples/floating-labels/floating-labels.css" rel="stylesheet">
	</head>
	<body>
		<form class="form-signin" method="POST" action="<?php echo base_url('login/action_login'); ?>">
			<div class="text-center mb-4">
				<img class="mb-4" src="https://getbootstrap.com/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Login to APP</h1>
			</div>

			<div class="form-label-group">
				<input type="text" name="username" class="form-control" placeholder="Username" required>
				<label for="inputEmail">Username</label>
			</div>

			<div class="form-label-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<label for="inputPassword">Password</label>
			</div>

			<div class="checkbox mb-3">
				<label><input type="checkbox" value="remember-me"> Remember me</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
		</form>
	</body>
</html>
