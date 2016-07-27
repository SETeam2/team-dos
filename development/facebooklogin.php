


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
$result = $conn->query($query_info);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$_SESSION['user']['id']    = $row['id'];
	$_SESSION['user']['name']  = $row['username'];
	$_SESSION['user']['email'] = $useremail;
	$_SESSION['LAST_ACTIVITY'] = time(); 
	header ( "Location: main.php" );

} else {
	// Add new user to User table
	$sql = "INSERT INTO users (email, password, username) VALUES ('$useremail', 'facebook', '$username')";

	if ($conn->query($sql) === TRUE) {
		$query_select = "SELECT id, username, password FROM users WHERE email = '$useremail' LIMIT 1";

		$result2 = $conn->query($query_select);

		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			$_SESSION['user']['id']    = $row2['id'];
			$_SESSION['user']['name']  = $row2['username'];
			$_SESSION['user']['email'] = $useremail;
			$_SESSION['LAST_ACTIVITY'] = time(); 
			header ( "Location: main.php" );
		}else{
			header ( "Location: login.html" );
		}
		

	} else {
		header ( "Location: login.html" );
	}
}

$conn->close();

?>
