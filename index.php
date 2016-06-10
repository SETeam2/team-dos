<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>

<title>Team Dos</title>

<style>
body {
	font-family: Arial;
}
form {
	background: #00FFFF;
	
	border: 1px solid black;
	
	width: 400px;
	margin: auto;
}
table {
	margin:auto;
}
th,td {
	padding: 10px;
}
h1, h2 {
	text-align:center;
}
</style>

</head>

<body>

<h1>Team Dos</h1>
<form method="post" action="login.php">
	<h2>Login</h2>
	<table>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" required></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Login"></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="new_account.html">Create New Account</a></td>
		</tr>
	</table>
</form>

</body>

</html>
