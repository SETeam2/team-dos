<?php
session_name('teamdos');
session_start ();


if (isset($_GET['username'])) {
	$_SESSION['user']['name']  = $_GET['username'];
	$_SESSION['user']['email'] = $_GET['email'];
	header ( "Location: main.php" );
}else{
    header ( "Location: login.html" );
}

?>


<?php
session_name('teamdos');
session_start();

// Open connection to mysql
$servername = "localhost";
$db_username = "root";
$db_password = "cs673";
$db_name = "master";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$username  = $_GET['username'];
	$useremail = $_GET['email'];

$query_info = "SELECT id, username, password FROM users WHERE email = '$useremail' LIMIT 1";

if ($conn->query($query_info)->num_rows > 0) {
	$_SESSION['user']['name']  = $_GET['username'];
	$_SESSION['user']['email'] = $_GET['email'];
	header ( "Location: main.php" );

} else {
	// Add new user to User table
	$sql = "INSERT INTO users (email, password, username) VALUES ('$useremail', 'facebook', '$username')";

	if ($conn->query($sql) === TRUE) {
		$_SESSION['user']['name']  = $_GET['username'];
		$_SESSION['user']['email'] = $_GET['email'];
		header ( "Location: main.php" );

	} else {
		header ( "Location: login.html" );
	}
}

$conn->close();

?>
