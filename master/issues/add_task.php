<?php
session_name('teamdos');
session_start ();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user if not logged in
} else if (! isset ( $_POST["title"] )) {
    header ( "Location: task_tracker_test.php" ); // Redirect if no issue posted
} else {

$title = addslashes($_POST["title"]);
$priority = $_POST["priority"];
$assignee = $_POST["assignee"];
$description = addslashes($_POST["description"]);

echo $title." ";
echo $priority." ";
echo $assignee." ";
echo $description." ";
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
$sql = "INSERT INTO tasks (id_project, title, priority, created_by_developer, description, status, last_updated, assignee) VALUES ('{$_SESSION['current_project']}','$title', '$priority','{$_SESSION[user][id]}', '$description', 'New', CURRENT_TIMESTAMP, '$assignee')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
echo "<script>";
echo "top.window.location = 'http://52.203.18.172/master/Task_Tracker.php?projectID=1';";
echo "</script>";    
/*<?php echo '<script type="text/javascript">window.top.location.href = "http://52.203.18.172/master2/Task_Tracker.php?projectID=1' . $_GET['classid'] . '"; </script>' ?>
/*header("Location:http://52.203.18.172/master2/Task_Tracker.php?projectID=1");
 
/* Make sure that code below does not get executed when we redirect. */
exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<p><a href=\"task_tracker.php\">Back</a><p>";

$conn->close();

}


?>
