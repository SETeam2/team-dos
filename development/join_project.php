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
$projecid   = (int)$_POST["projecid"];
$userid     = (int)$_SESSION['user']['id'];

// Open connection to mysql
$servername = "localhost";
$db_username = "root";
$db_password = "cs673";
$db_name = "master";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if($projecid  == 0){
    header ( "Location: main.php" );
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO project_developers (user_id, project_id) 
SELECT * FROM (SELECT '$userid', '$projecid') AS tmp
WHERE NOT EXISTS (
    SELECT user_id,project_id FROM project_developers WHERE user_id = '$userid' AND project_id = $projecid
) LIMIT 1";

if($conn->query($sql) === TRUE){
    header ( "Location: main.php" );
}else{
    header ( "Location: main.php" );
}
$conn->close();

?>

</body>
</html>
