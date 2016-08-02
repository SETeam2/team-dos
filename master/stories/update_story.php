<?php
session_name('teamdos');
session_start ();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user
} else if (! isset ( $_POST["title"] )) {
    header ( "Location: stories_test.php" ); // Redirect if no issue posted
} else {

$storyid = $_GET['storyid'];

$story_name = addslashes($_POST["story_name"]);
$story_description = $_POST["story_description"];
$created_by_developer = $_POST["created_by_developer"];


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

// Update issue
$sql = "UPDATE stories SET story_name='$story_name', story_description='$story_description', created_by_developer='$created_by_developer' WHERE id='$storyid' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully. ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<p><a href=\"stories_test.php?storyid=".$storyid."\">Back</a><p>";

$conn->close();
}

?>