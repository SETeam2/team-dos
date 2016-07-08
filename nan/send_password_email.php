
<?php
session_name('teamdos');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Team Dos</title>
</head>

<body>
<?php
// variables
if (isset($_POST["email"]) ) {
	$email    = $_POST["email"];

	// Open connection to mysql
	$servername = "localhost";
	$db_username = "root";
	$db_password = "cs673";
	$db_name = "nan";

	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_name);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Check if email password combination are correct
	$query_info = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
	$result = $conn->query($query_info);

	// fetch associative array
	$row = $result->fetch_assoc();

	// If email and password combination are correct
	if (isset($row["id"])) {		
		$to = $email;
		
		$url= "http://52.203.18.172/nan/password_reset.php?uid=".$row["id"];
		$txt = "We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.
		                  
	Click the link below to reset your password using our unsecure server:
		        
		$url
		        
	If clicking the link doesn't seem to work, you can copy and paste the link into your browser's address window, or retype it there. Once you have returned to our site, we will give instructions for resetting your password.
		";

		$subject = "Teamdos Password Reset (do not reply)";
		$headers = "From: teamdos@gmail.com" . "\r\n" .

		mail($to,$subject,$txt,$headers);
	    
	    // Go to tracker page
	    echo "A password recovery Email will be sent to email address : ".$email." shortly.";
	

	} else {
	    // email and password are not correct
	    echo "unable to find your email in our records";
	}



}else{
	echo "please provide a valid email address";
}


$conn->close();
?>
<a href="index.php">
<b>Back to Login<b></a>

</body>
</html>

