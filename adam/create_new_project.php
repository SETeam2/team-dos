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

if ($result->num_rows > 0) {
     // throw error
     echo "Project by this name already exists.";
} else {
    $sql = "INSERT INTO projects (name, password)
                VALUES ('$project', '$password')";

        if ($conn->query($sql) === TRUE) {
            if ($project != '') {
                echo "New project " . $project . " created!";
            } else {
                echo "An error occurred; please enter your project credentials.";
            }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// fetch associative array
$row = $result->fetch_assoc();

$conn->close();
?>
<br>
<a href="project_join.html">
<b>Back to my projects<b></a>

</body>
</html>
