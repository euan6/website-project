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
	<title>Programming Reviews | Read Reviews</title>
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
			<li><a class="active" href="readReviews.php">Read Review</a></li>
			<li><a href="AddReview.php">Add Review</a></li>
			<li><a href="searchReview.php">Search</a></li>
			<li><a href="signUp.php">Sign Up</a></li>
			<li><a href="logIn.php">Log In</a></li>
		</ul>
	</nav>
	
	<main>
		<div id="area1"> <!-- main area -->
			<h1>Read Reviews</h1>

				<?php
				//if a user is logged in then display content
				if ($_SESSION['userLogin'] == true){
				echo '<p>Here are a list of all the reviews that have been written and submitted!</p>';
				//else display error message saying you must be logged in
				} else {
					echo '<p>You must be logged in to view this content!</p>';	
				}
				
				$username = 'root';
				$password = '';
				$dbname = 'project';
				$servername = '127.0.0.1';
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//establish connection to database
				if (!$conn){
					die("Connection Failed"); 
				}

				//setup and execute SQL query
				$sql = 'SELECT * FROM reviewdetails ORDER BY reviewID ASC;';
				$queryResult = mysqli_query($conn, $sql);

				//if no results are found then display message
				if ($queryResult == '') {
					echo '<p>Unfortunately, no reviews have been found at this current moment.</p>';
				//else if a user is logged in then display table 
				} else if ($_SESSION['userLogin'] == true){
					echo '<br><table>';
					$output = "<tr><th>ID<th>Language<th>Text<th>Rating<th>Date</tr>";
					echo "<p>$output</p>";
					//if a user is logged in then display records from database in table
					while (($result = mysqli_fetch_array($queryResult)) AND ($_SESSION['userLogin'] == true)) {
						$reviewID = $result['reviewID'];
						$reviewLanguage = $result['reviewLanguage'];
						$reviewText = $result['reviewText'];
						$reviewRating = $result['reviewRating'];
						$reviewDate = $result['reviewDate'];
						$output = "<tr><td> $reviewID <td> $reviewLanguage ";
						$output = $output . "<td> $reviewText";
						$output = $output . "<td> $reviewRating <td> "; 
						$output = $output . "$reviewDate </tr>";
						echo "<p>$output</p>";
					} 
					echo "</table>";
				}
				//if a user is logged then display how many records were found and displayed
				if ($_SESSION['userLogin'] == true){
					$num = mysqli_num_rows($queryResult);
					if($num == 1){
						echo '<p>' .$num.' record was extracted.'. '</p>';
					} else {
						echo '<p>'.$num.' records were extracted.'. '</p>';
					}
				}
				mysqli_free_result($queryResult);
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
				<img src="images/play-store.png">
				<img src="images/app-store.png">
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