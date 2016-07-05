<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Team Dos</title>
</head>

<body>
<?php
// variables
$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

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

// Check if email already exists in User table
// NEED TO ALSO CHECK IF USERNAME IS TAKEN
$sql_check_email = "SELECT id FROM users WHERE email = '$email'";
if ($conn->query($sql_check_email)->num_rows > 0) {
	echo "<p>This email is already in use. Go back and try again!</p>";
	echo "<a href=\"new_account.html\"><b>Create New Account<b></a>";
} else {
	// Add new user to User table
	$sql = "INSERT INTO users (email, password, username) VALUES ('$email', '$password', '$username')";

	if ($conn->query($sql) === TRUE) {
		echo "<p>Welcome $username!</p>";
		echo "<p>You have successfully created a new user account.</p>";
		echo "<p>Login to begin working.</p>";
		echo "<a href=\"index.php\"><b>Login<b></a>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();
?>

</body>
</html>
