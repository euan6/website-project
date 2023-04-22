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
	<title>Programming Reviews | Home Page</title>
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
			<li><a class="active" href="home.php">Home Page</a></li>
			<li><a href="readReviews.php">Read Review</a></li>
			<li><a href="AddReview.php">Add Review</a></li>
			<li><a href="searchReview.php">Search</a></li>
			<li><a href="signUp.php">Sign Up</a></li>
			<li><a href="logIn.php">Log In</a></li>
		</ul>
	</nav>
	
	<main>
		<div id="area1"> <!-- main area -->
			<h1>Home Page</h1>

				<?php
						//if a user is logged in then display content
						if ($_SESSION['userLogin'] == true){
							echo '<p>Welcome! This website stores the most up to date and reliable programming language reviews, which lets experts of the language give their views and opinions on what the language is like!</p>
							<p>We are very proud of the quality of our service and of our reputation. </p>
							<p>Please refer to the navigation bar located at the top to easily find your way about the website as this contains links to important pages. Otherwise refer to the footer at the very bottom of the page for any other useful links, or to download our app which is not on the app store and the google play store.</p>
							<div class="logo">
								<img src="images/python.png" alt="python.png">
								<img src="images/php.png" alt="php.png">
								<img src="images/javascript.png" alt="javascript.png">
								<img src="images/C.png" alt="C#.png">
								<img src="images/java.png" alt="java.png">		
							</div>';
							//else display error message saying you must be logged in
						} else {
							echo '<p>You must be logged in to view this content!</p>';
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
</body>
</html>