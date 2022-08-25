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
        * The user is asked to enter the item and quantity amount that they want to add to their shopping list.
     -->

<head>
	<title>Coinflip Bonanza | Sign-Up</title>
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
		<div id="hide" class="signin-form">
			<form action="include/register.php" method="POST">
				<div class="styleform">
					<p>USERNAME*</p><input type="text" name="name" id="name" placeholder="username">
					<p>EMAIL*</p><input type="email"  name="email" id="email" placeholder="you@domain.com"> 
					<p>PASSWORD*</p><input type="password" name="password" id="password" placeholder="********"> 
					<p>CONFRIM PASSWORD*</p><input type="password" name="copypassword" id="copypassword" placeholder="********"> 
				</div>
				<button type="submit" name="submit" id="submit">Sign-Up</button>
			</form>
		</div>
	</section>
</body>

</html>
