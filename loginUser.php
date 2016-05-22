<?php include_once('libs/login_user.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Advanced Tutorial</title>
</head>
<body>
	<div id="mainWrapper">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      
			      <a class="navbar-brand" href="#">Todo Maker</a>
			    </div>
			</div><!-- /.container-fluid -->
		</nav>
	</div>

	<div id="content">

		<?php
			if (isset($error)) {
				echo ' <div class="alert alert-error"> '.$error.' </div> ';
			}
		?>
		<div id="form">
		<form method="post" action="loginUser.php">
			<h2>  Register Here</h2>
			<div class="form-elemnt">
				<label for="username"> Username </label><br/>
				<input type="text" name="username" id="username" />
			</div>

			<div class="form-elemnt">
				<label for="email"> Email </label><br/>
				<input type="text" name="email" id="email" />
			</div>

			<div class="form-elemnt">
				<label for="passwd"> Password </label><br/>
				<input type="password" name="passwd" id="passwd" />
			</div>

			<div class="form-elemnt">
				<label for="repasswd"> Re-Password </label><br/>
				<input type="password" name="repasswd" id="repasswd" />
			</div>


			<div class="form-elemnt">
				<input type="submit" name="register" id="register" class="btn btn-success" />
			</div>
		</form>
		</div>
	</div>

</body>
</html>