<?php
// Start the session
    if(session_status() !== PHP_SESSION_ACTIVE)
    {
        session_start();
        // If the session variable userLogin does not exist then create one.
        if (!isset($_SESSION['userLogin'])) {
            $_SESSION['userLogin'] = False ;   
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Programming Reviews | Log In</title>
	<link href="projectStyle.css" type="text/css"	rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
	<div id="banner"> <!-- header banner -->
		<header>
			<h1>Programming Reviews</h1>
		</header>
	</div>
	
	<nav> <!-- nav bar -->
		<ul>
			<li><a href="home.php">Home Page</a></li>
			<li><a href="readReviews.php">Read Review</a></li>
			<li><a href="AddReview.php">Add Review</a></li>
			<li><a href="searchReview.php">Search</a></li>
			<li><a href="signUp.php">Sign Up</a></li>
			<li><a class="active" href="logIn.php">Log In</a></li>
		</ul>
	</nav>
	
	<main>
		<div id="area1"> <!-- main area -->
			<h1>Log In</h1>

				<?php
				//if a user is logged in then display welcome message
				if ($_SESSION['userLogin'] == true){
					echo '<p>Welcome back! You are currently logged in as user:</p>';
					echo $_SESSION['user2'];
					echo '<form action="logOut.php" method="POST">
									<input type="submit" value="Log Out">
								</form>';
				//else display HTML form to let a user login
				} else {
					echo '<p>Use the form below to log in to your account to access the website.</p>
				<div class="addform">
					<form action="checkLogin.php" method="POST">              
						<p>Username:</p>
						<input type="text" name="username" maxlength="20" placeholder="Please enter your username here" autocomplete="off" required>
						<br><br>
						<p>Password:</p>
						<input type="password" name="password" maxlength="100" placeholder="Please enter your password here" autocomplete="off" id="pass" required>
						<input type="checkbox" onclick="hideFunction()">			  
						<input type="submit" value="Submit">             
					</form>
				</div>';
				}
				?>

		</div>
	</main>
	
	<footer>
	
		<div class="col1"> <!-- footer download column -->
			<h2>Download our App</h2>
			<ul>
				<li>Download on the app store or google play store</li>
			</ul>
			<div class="app-logo">
				<img src="images/play-store.png" alt="playstore.png">
				<img src="images/app-store.png" alt="appstore.png">
			</div>		
		</div>
		
		<div class="col2"> <!-- footer contact column -->
			<h2>Contact us</h2>
			<ul>
				<li>Tel: 0131 345 6789</li>
				<li>Fax: 0131 987 6543</li>
				<li>Email: programming@reviews.com</li>
			</ul>
		</div>
		
		<div class="col3"> <!-- footer socials column -->
			<h2>Follow us</h2>
			<ul>
				<li class="fb">Facebook</li>
				<li class="tw">Twitter</li>
				<li class="in">Instagram</li>
				<li class="yt">YouTube</li>
			</ul>
		</div>
	</footer>
	<script src="main.js"></script> <!-- javascript file for toggling password visibility -->
</body>
</html>