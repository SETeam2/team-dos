<?php
session_name('teamdos');
session_start ();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user
} else if (! isset ( $_POST["comment_text"] )) {
    header ( "Location: issue_tracker_test.php" ); // Redirect if no issue posted
} else {

$issueid = $_GET['issueid'];

$comment_text = addslashes($_POST["comment_text"]);

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

// insert in issue_comments table (comment_type = 0 for issues, 1 for tasks)
$sql = "INSERT INTO issue_comments (issue_id, created_by_developer, comment) VALUES ('$issueid', '{$_SESSION['user']['id']}', '$comment_text')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. ";

    // update "last_updated" timestamp
    $sql = "UPDATE issues SET last_updated=CURRENT_TIMESTAMP WHERE id='$issueid'";

    if ($conn->query($sql) === TRUE) {
        echo "Timestamp updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<p><a href=\"issue_test.php?issueid=".$issueid."\">Back</a><p>";

$conn->close();
}

?>