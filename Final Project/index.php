<?php
	// Start's a new session.
	session_start();
?>

<!DOCTYPE html>
<html>
<!-- 
        * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
        * Due: December 10th, 2021.
        *
        * The user is asked to enter their username and password. If they don't have any account they can redirect themselves to the signup.php.
     -->
	 
<head>
	<title>Coinflip Bonanza</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section>
		<header>
			<h1>Coinflip Bonanza</h1>
			<p>by Anthony. Bauld</p>
		</header>
		<div id="hide" class="login-form">
			<form action="include/login.php" method="POST">
				<div class="styleform">
					<p>USERNAME*</p><input type="text" name="name" id="name" placeholder="username">
					<p>PASSWORD*</p><input type="password" name="password" id="password" placeholder="********"> 
				</div>
                    <div class="register">
                        <a href="signup.php">Register Now!</a>
                    </div>
					<button type="submit" name="submit" id="submit">Login</button>
			</form>
		</div>
	</section>
</body>
</html>
