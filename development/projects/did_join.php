<?php include('../php_components/session_validation') ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Team Dos</title>
</head>

<body>
<?php
// variables
$project    = $_POST["project"];
$password = $_POST["password"];

// Open connection to mysql
$servername = "localhost";
$db_username = "root";
$db_password = "cs673";
$db_name = "tracker_database";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email password combination are correct
$query_info = "SELECT * FROM projects WHERE name = '$project' LIMIT 1";
$result = $conn->query($query_info);

// fetch associative array
$row = $result->fetch_assoc();

// If email and password combination are correct
if ($row["password"] === $password) {
    echo "Success! Added to project. \n";
    // Set session variables
    // $_SESSION['user']['id']    = $row["id"];
    // $_SESSION['user']['name']  = $row["username"];
    // $_SESSION['user']['email'] = $row["email"];
    
    // Go to tracker page
    // TODO: go to success page
    // header ("Location: main.php");

} else {
    // email and password are not correct
    echo "Project name and/or password are not correct. Please try again.  ";
}

$conn->close();
?>
<br>
<a href="project_join.html">
<b>Back<b></a>

</body>
</html>
