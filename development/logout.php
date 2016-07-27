<?php
session_name('teamdos');
session_start();
$_SESSION = array();
unset($_SESSION);
header ( "Location: login.html" ); // Redirect the user
?>
