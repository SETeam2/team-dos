<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Team Dos</title>
<style>
body {
	font-family: Arial;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #707070;
	top: 0;
	width: 100%;
}
li {
    float: left;
}

li a, li b {
    display: block;
    color: white;
    text-align: center;
    padding: 15px 15px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #404040;
}

.active {
    background-color: #000000;
}
</style>
</head>

<body>
<ul>
	<li><a href="tasks.php">Tasks</a></li>
	<li><a href="messages.php">Messages</a></li>
	<li><a href="issues.php">Issues</a></li>
	<li><a class="active">My Projects</a></li>
	<li><b>Current Project Name</b></li>
	<li style="float:right">
		<ul>
			<li><b><?php echo $_SESSION["current_username"];?></b></li>
			<li><a href="index.php">Logout</a></li>
		</ul>
	</li>
</ul>

<h1>Select Current Project</h1>
	<form action="">
		<select name="select_proj">
			<option disabled selected value> -- Current Working Project -- </option>
			<option value="proj_1">Project 1</option>
			<option value="proj_2">Project 2</option>
			<option value="proj_3">Project 3</option>
			<option value="proj_4">Project 4</option>
		</select>
		<input type="submit" value="Select Project">
	</form>
<br>
<h1>Project Settings</h1>
<p>
<h3>Create New Project</h3>
	<form action="">
		<input type="text" name="new_proj" required>
		<input type="submit" value="Create Project">
	</form>
<br>
<h3>Join Existing Project</h3>
	<form action="">
		<select name="join_proj">
			<option disabled selected value> -- Select Project to Join -- </option>
			<option value="proj_1">Project 1</option>
			<option value="proj_2">Project 2</option>
			<option value="proj_3">Project 3</option>
			<option value="proj_4">Project 4</option>
		</select>
		<input type="submit" value="Join Project">
	</form>
<br>
<h3>Leave a Project</h3>
	<form action="">
		<select name="leave_proj">
			<option disabled selected value> -- Select Project to Leave -- </option>
			<option value="proj_1">Project 1</option>
			<option value="proj_2">Project 2</option>
			<option value="proj_3">Project 3</option>
			<option value="proj_4">Project 4</option>
		</select>
		<input type="submit" value="Leave Project">
	</form>
</body>

</html>
