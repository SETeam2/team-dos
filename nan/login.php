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
$email    = $_POST["email"];
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

// Check if email password combination are correct
$query_info = "SELECT id, username, password FROM users WHERE email = '$email' LIMIT 1";
$result = $conn->query($query_info);

// fetch associative array
$row = $result->fetch_assoc();

// If email and password combination are correct
if ($row["password"] === $password) {
    
    // Set session variables
    $_SESSION['user']['id']    = $row["id"];
    $_SESSION['user']['name']  = $row["username"];
    $_SESSION['user']['email'] = $row["email"];
    
    // Go to tracker page
    header ("Location: main.php");

} else {
    // email and password are not correct
    echo "Email and password combination are not correct. Please go back and try again.";
}

$conn->close();
?>
<a href="index.php">
<b>Back to Login<b></a>

</body>
</html>
