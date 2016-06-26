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

	<script src="./fbapp/fb.js">

	</script>
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
	
	<div id="content" style="width: 70%; float: left;">
		<h1>Welcome to the TEAM DOS website!</h1>
	</div>


<div id="sidebar" style="width: 20%; float: right">
	<div class="fb-login-button" data-scope = "public_profile,email" onlogin="checkLoginState();"></div>	
</div>

</body>

</html>
