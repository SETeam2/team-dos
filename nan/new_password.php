
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
if (isset($_POST["uid"]) && isset($_POST["password"])) {
	$id       = $_POST["uid"];
	$password = $_POST["password"];

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

	// Create update query
	$sql = "UPDATE users SET password=$password where id=$id";	

	if ($conn->query($sql) === TRUE) {
		echo "<p>Your password has been reset successfully.</p>";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<p>unable tp update your password</p>";
	}

}else{
	echo "invalid request";
}

$conn->close();
?>
<a href="index.php">
<b>Back to Login<b></a>

</body>
</html>

