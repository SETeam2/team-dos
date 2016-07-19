<?php
session_name('teamdos');
session_start ();
/*
if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: login.html" ); // Redirect the user
}
*/

$id = $_POST["ID"];
$title = $_POST["story_name"];
$creator = $_POST["created_by_developer"];
$modified_at = $_POST["created_at"];
$story_detail = $_POST["story_text"];

// Open connection to mysql
$servername = "localhost";
$db_username = "root";
$db_password = "cs673";
$db_name = "story";

//priority low med high = 0 1 2
//if ($priority == "Low"){
  //  $priority_enum = 0;

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

// insert in issue table
$sql = "INSERT INTO story (id, story_name, story_text, created_by_developer, created_at) VALUES ('$id', '$story_name', '$story_detail', '$creator', '$modified_at');

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "Connected successfully";

$conn->close();
?>
