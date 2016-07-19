<?php
session_name('teamdos');
session_start ();
if (isset ( $_SESSION['user']['name'] )) {
	header ( "Location: main.php" ); // Redirect the user
}else{
	header ( "Location: login.html" ); // Redirect the user
}
?>
