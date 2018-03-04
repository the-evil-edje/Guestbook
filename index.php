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
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Guestbook</title>
	</head>
  <body>
		<head>
			<h1>Welcome to this page</h1>
			<p>Here u can sign in into the guestbook</p>
		</head>
		<form method="GET">
  	First name: <input type="text" name="firstName"><br>
		Insertion: <input type="text" name="insertion"><br>
  	Last name: <input type="text" name="lastName"><br>
		Email adress: <input type="text" name="emailAdress"><br>
		Website adress: <input type="text" name="websiteAdress"><br>
		Message: <input type="text" name="message"><br>
		captcha: <input type="text" name="captcha"><br>
		<img id="captchaImg" src="img/captcha.gif" ><br>
  	<input type="submit" name="Submit" value="Submit">
		<input type="reset" name="Reset" value="Reset">
		<?php

		if ($firstName !== "") {
			echo "get first name";
			if ($lastName !== "") {
				echo "get lastName";
				if ($emailAdress !== "") {
					echo "get email";
					if ($message !== "") {
						echo "get message";
						if ($captcha == "W68HP") {
							echo "get captcha";
							$captcha = "";
						}
						else {
							echo "need captcha";
						}
						$message = "";
					}
					else {
						echo "need a message";
					}
					$emailAdress = "";
				}
				else {
					echo "need a email";
				}
				$lastName = "";
			}
			else {
				echo "need last name";
			}
			$firstName = "";
		}
		else {
			echo "need first name";
		}

		if (isset($_GET['reset'])) {
			$firstName = "";
			$insertion = "";
			$lastName = "";
			$emailAdress = "";
			$websiteAdress = "";
			$message = "";
			$captcha = "";
		}

		?>
<!-- $sql = "INSERT INTO guestbook (FirstName, Insertion, LastName, EmailAdress, WebsiteAdress, Message)
VALUES ($firstName, $insertion, $lastName, $emailAdress, $websiteAdress, $message)
 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}-->
		</form>
		<?php
			require 'inc/footer.php'
		?>
  </body>
</html>
