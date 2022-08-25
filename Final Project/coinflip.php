<?php
	// Start's a new session.
	session_start();
	// Execute this if statement if the session is not set to the username.
	if(!isset($_SESSION['username'])) {
		// The user is redirected to the homepage, where they can log in.
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<!-- 
        * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
        * Due: December 10th, 2021.
        *
        * This is the HTML framework for the coinflip website; it contains the button, the textbox for entering the bet, and all of the divs needed to build the game in css and js.
     -->

<head>
	<title>Coinflip Bonanza</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style2.css">
	<script src="js/coinflip.js"></script>
</head>

<body>
	<section>
		<header>
			<h1>Coinflip Bonanza</h1>
			<p>by Anthony. Bauld</p>
		</header>
		<div id="hide" class="login-form">
			<form action="login.php" method="POST">
				<div class="styleform">
				<div id="win" class="win"> </div>
				<div id="loss" class="loss"> </div>
					<div class ="coin">
						<div class="heads">
							<img src="img/heads.png">
						</div>
						<div class="tails">
							<img src="img/tails.png">
						</div>
					</div>
					<input type="number" min="1" id="bet" name="bet" placeholder="Place Bet" autofocus>
					<div class="buttons">
					<div id="balance" class="balance"> </div>
					<button type="button" id="wager">Bet</button>
					</div>
					<?php
						//  Execute this if statement if the session is set to the username.
						if(isset($_SESSION["username"])) {
							// Returns the user to the homepage by echoing a href that leads them to logout.php.
							echo "<a href='include/logout.php'>Logout</a>";
						}
					?>
			</form>
		</div>
	</section>
</body>
</html>
