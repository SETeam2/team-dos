<?php
session_name('teamdos');
session_start ();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user if not logged in
} else if (! isset ( $_POST["title"] )) {
    header ( "Location: story_test.php" ); // Redirect if no issue posted
} else {

$story_name = addslashes($_POST["story_name"]);
$assignee = $_POST["assignee"];
$story_description = addslashes($_POST["story_description"]);
$project = $_POST['projectID'];

//echo $project." "
echo $story_name." ";
echo $assignee." ";
echo $story_description." ";
echo $_SESSION[user][id]." ";

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

// insert in issue table
$sql = "INSERT INTO stories (id_project, story_name, created_by_developer, story_description, last_updated, assignee) VALUES ('{$_SESSION['current_project']}','$story_name','{$_SESSION[user][id]}', '$story_description', CURRENT_TIMESTAMP, '$assignee')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
echo "<script>";
echo "top.window.location = 'http://52.203.18.172/master/Stories.php?projectID=$project';";
echo "</script>";


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo mysql_error();
}

echo "<p><a href=\"story_test.php\">Back</a><p>";

$conn->close();

}


?>
