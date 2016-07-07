<?php
session_name('teamdos');
session_start ();


if (isset($_GET['username'])) {
	$_SESSION['user']['name']  = $_GET['username'];
	$_SESSION['user']['email'] = $_GET['email'];
	header ( "Location: main.php" );
}else{
    header ( "Location: login.html" );
}

?>
