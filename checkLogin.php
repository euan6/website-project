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
	<title>Programming Reviews | Sign Up</title>
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
			<h1>Sign Up</h1>

				<?php
				$username = 'root';
				$password = '';
				$dbname = 'project';
				$servername = '127.0.0.1';
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//establish connection to database
				if (!$conn){
				die("Connection Failed"); 
				}

				//get username and password from HTML form
				$user = $_POST['username'];
				$pass = $_POST['password'];

				//setup and execute SQL query
				$sql = "SELECT username, password FROM userdetails WHERE username = '$user' AND password = '$pass'";
				$queryResult = mysqli_query($conn, $sql);
				$numRows = mysqli_num_rows($queryResult);

				//if no records are found with the username and password entered display error message and back button
				if($numRows == 0){
				echo "<p>Your account details are incorrect, please try again!</p>";
				//takes you back to the login page
				echo '<form action="logIn.php" method="POST">
								<input type="submit" value="Back">
							</form>';
				//else start session and redirect to the home page
				} else {
				$_SESSION['userLogin'] = true;
				$_SESSION['user2'] = $user;
				$_SESSION['pass2'] = $pass;
				header("Location: home.php");
				}

				mysqli_close($conn);
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