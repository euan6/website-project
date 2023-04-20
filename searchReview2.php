<!DOCTYPE html>
<html lang="en">
<head>
	<title>Programming Reviews | Search Reviews</title>
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
			<li><a class="active" href="searchReview.php">Search</a></li>
			<li><a href="signUp.php">Sign Up</a></li>
			<li><a href="logIn.php">Log In</a></li>
		</ul>
	</nav>
	
	<main>
		<div id="area1"> <!-- main area -->
			<h1>Search Reviews</h1>

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

				//get search criteria from HTML form
				$search = $_POST['searchCriteria'];
				//if there is a search criteria then display message saying reviews with search criteria in their record
				if ($search != ''){
					$output = "Reviews containing '$search' in their record";
					echo "<br><p>$output</p>";
				} else {
					$output = "Search Criteria is blank - please enter text";
					echo "<br><p>$output</p>";
				}

				//setup and execute SQL query
				$sql = "SELECT * FROM reviewdetails WHERE reviewLanguage LIKE '%$search%' OR reviewText LIKE '%$search%' OR reviewRating LIKE '%$search%';";
				$queryResult = mysqli_query($conn, $sql);

				//if no results are found then display message
				if ($queryResult == '') {
					echo '<p>Unfortunately, no reviews have been found at this current moment.</p>';
				//else display table
				} else {
					echo '<br><table>';
					$output = "<tr><th>ID<th>Language<th>Text<th>Rating<th>Date</tr>";
					echo "<p>$output</p>";	
					//display records from database in table		
					while ($result = mysqli_fetch_array($queryResult)) {
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
					//displays a back button that takes you back to the search bar
					echo '<form action="searchReview.php" method="POST">
						      <input type="submit" value="Back">
						  </form>';
				}
				//if a user is logged then display how many records were found and displayed
				$num = mysqli_num_rows($queryResult);
				if($num == 1){
					echo '<p>' .$num.' record was extracted.'. '</p>';
				} else {
					echo '<p>'.$num.' records were extracted.'. '</p>';
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