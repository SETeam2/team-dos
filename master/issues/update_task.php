I<?php
session_name('teamdos');
session_start ();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user
} else if (! isset ( $_POST["title"] )) {
    header ( "Location: task_tracker_test.php" ); // Redirect if no issue posted
} else {

$issueid = $_GET['issueid'];

$title = addslashes($_POST["title"]);
$priority = $_POST["priority"];
$status = $_POST["status"];
$assignee = $_POST["assignee"];

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
$sql = "UPDATE tasks SET title='$title', priority='$priority', status='$status', last_updated=CURRENT_TIMESTAMP, assignee='$assignee' WHERE id='$issueid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully. ";
echo "<script>";
echo "top.window.location = 'http://52.203.18.172/master/Task_Tracker.php?projectID=1';";
echo "</script>";


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<p><a href=\"task_test.php?issueid=".$issueid."\">Back</a><p>";

$conn->close();
}

?>
