<?php
session_name('teamdos');
session_start();
if (!isset ($_SESSION['user']['name'])) {
    header("Location: login.html"); // Redirect the user
}
?>
<?php
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

$sql = "SELECT id,name FROM projects";
$result = mysqli_query($conn, $sql);
$projects = array();

while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = $row;
}
//echo "{ \"projects\" : ";
echo json_encode($projects);
//echo " }";

mysqli_close($conn);
?>