<!DOCTYPE html>
<?php
		require 'inc/database-connection.php';

		$firstName = "";
		$insertion = "";
		$lastName = "";
		$emailAdress = "";
		$websiteAdress = "";
		$message = "";
		$captcha = "";

if (isset($_GET['firstName'])) {
	$firstName = $_GET['firstName'];
}

if (isset($_GET['insertion'])) {
	$insertion = $_GET['insertion'];
}

if (isset($_GET['lastName'])) {
	$lastName = $_GET['lastName'];
}

if (isset($_GET['emailAdress'])) {
	$emailAdress = $_GET['emailAdress'];
}

if (isset($_GET['websiteAdress'])) {
	$websiteAdress = $_GET['websiteAdress'];
}

if (isset($_GET['message'])) {
	$message = $_GET['message'];
}

if (isset($_GET['captcha'])) {
	$captcha = $_GET['captcha'];
}

?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Guestbook">
		<meta name="keywords" content="HTML,CSS,php">
		<meta name="author" content="Eddie Beelen">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Guestbook</title>
	</head>
  <body>
		<head>
			<h1>Welcome to this page</h1>
			<p>Here u can sign in into the guestbook</p>
		</head>
		<form method="GET">

			<table>
				<tr>
					<td>First name:</td>
					<td><input type="text" name="firstName" required></td>
				</tr>
				<tr>
					<td>Insertion:</td>
					<td><input type="text" name="insertion"></td>
				</tr>
				<tr>
					<td>Last name:</td>
					<td><input type="text" name="lastName" required></td>
				</tr>
				<tr>
					<td>Email adress:</td>
					<td><input type="email" name="emailAdress" required></td>
				</tr>
				<tr>
					<td>Website adress:</td>
					<td><input type="text" name="websiteAdress"></td>
				</tr>
				<tr>
					<td>Message:</td>
					<td><input type="text" name="message" required></td>
				</tr>
				<tr>
					<td>captcha:</td>
					<td><input type="text" name="captcha" required></td>
				</tr>
			</table>

    <img id="captchaImg" src="img/captcha.gif" ><br>
  	<input type="submit" name="Submit" value="Submit">
		<input type="reset" name="Reset" value="Reset">
		<?php


		if (isset($_GET['Submit'])) {
			if ($captcha == "W68HP") {
				$sql = "INSERT INTO guestbook (FirstName, Insertion, LastName, EmailAdress, WebsiteAdress, Message)
				VALUES ('$firstName', '$insertion', '$lastName', '$emailAdress', '$websiteAdress', '$message')";
				$firstName = "";
				$insertion = "";
				$lastName = "";
				$emailAdress = "";
				$websiteAdress = "";
				$message = "";
				$captcha = "";
				 if (mysqli_query($conn, $sql)) {
						echo "Thank you for posting";
						header("location: index.php");
				} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				};
			}
		}



		?>

		</form>
		<div class="review">

    <?php
    $sql5 = "select * from guestbook";
    $reviewRatings = mysqli_query($conn, $sql5);

 $reviews = array();
 while($row5 = mysqli_fetch_assoc($reviewRatings))
 {
   $reviews[] = $row5;
 }

 foreach($reviews as $review)
 {
   echo "<div class='reviewDiv'>"; echo "<br>";
	 echo "Message: ";
   echo $review['Message']; echo "<br>";
	 echo "Email adress: ";
	 echo $review['EmailAdress']; echo "<br>";
	 echo "Website adress: ";
	 echo $review['WebsiteAdress']; echo "<br>";
   echo "</div>";
 }
 $review = "";
  ?>

  </div>
		<?php
			require 'inc/footer.php'
		?>
  </body>
</html>
