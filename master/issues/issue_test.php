<?php
session_name('teamdos');
session_start ();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user
}

// variables
$issueid = $_GET['issueid'];

// Open connection to mysql
$servername = "localhost";
$db_username = "root";
$db_password = "cs673";
$db_name = "master";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// query current project name
$curr_project = $conn->query("SELECT * FROM projects WHERE id='{$_SESSION["current_project"]}';")->fetch_assoc();

#select issues.xyzz, users.username, from issues join users on users.id=issues.assignee; 
// query issue table
$sql = "SELECT * FROM issues WHERE id = $issueid";
$result = $conn->query($sql);
$issue_data = $result->fetch_assoc();

// get issue comments
$issue_comments = $conn->query("SELECT * FROM issue_comments WHERE issue_id = $issueid");

// get project users
$get_users_query = "SELECT users.username, users.id FROM project_developers JOIN users ON project_developers.user_id=users.id JOIN projects ON project_developers.project_id=projects.id WHERE project_id='{$_SESSION["current_project"]}';";
$get_user = $conn->query($get_users_query);

// Get creator name
$sql_creator = "SELECT username FROM users WHERE id='{$issue_data[created_by_developer]}' LIMIT 1;";
$get_creator = $conn->query($sql_creator);
$creator = $get_creator->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="">

<?php
echo "<title>Issue #".$issue_data[id]."</title>";
?>

<!-- Bootstrap core CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Datepicker 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css" />
-->

<!-- Custom styles -->
<link href="issue_tracker.css" rel="stylesheet">

</head>

<body>

    <div class="container">

		<div class="page-header">
			<button type="button" class="btn btn-primary"  onclick="window.location.href='issue_tracker_test.php';">Back</button>

			<?php echo "<h2>Issue #".$issue_data[id]." <small>Created ".$issue_data[date_created]." by ".$creator[username]."</small></h2>"; ?>

		</div>
		
		<form class="form-horizontal" role="form" method="post" action="update_issue.php?issueid=<?php echo $issue_data[id];?>"> 
			<div class="form-group">
				<label class="col-sm-2 control-label">Title:</label>
				<div class="col-sm-10">
					<?php
					echo "<input type=\"text\" class=\"form-control\" name=\"title\" required=\"required\" value=\"".$issue_data[title]."\">";
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Priority:</label>
				<div class="col-sm-10">
					<select class="form-control" name="priority" required="required">
						<option <?php if ($issue_data[priority] == "Low") {echo "selected=\"selected\"";}?>>Low</option>
						<option <?php if ($issue_data[priority] == "Medium") {echo "selected=\"selected\"";}?>>Medium</option>
						<option <?php if ($issue_data[priority] == "High") {echo "selected=\"selected\"";}?>>High</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status:</label>
				<div class="col-sm-10">
					<select class="form-control" name="status" required="required">
						<option <?php if ($issue_data[status] == "New") {echo "selected=\"selected\"";}?>>New</option>
						<option <?php if ($issue_data[status] == "In Progress") {echo "selected=\"selected\"";}?>>In Progress</option>
						<option <?php if ($issue_data[status] == "Completed") {echo "selected=\"selected\"";}?>>Completed</option>
					</select>
				</div>
			</div>
			<!-- Due date no longer needed
			<div class="form-group">
				<label class="col-sm-2 control-label">Due Date:</label>
				<div class="col-sm-10">
					<div class="input-group input-append date" id="datePicker">
						<input type="text" class="form-control" name="date">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
			</div>
			-->
			<div class="form-group">
				<label class="col-sm-2 control-label">Assignee:</label>
				<div class="col-sm-10">
					<select class="form-control" name="assignee" required="required">
						<?php
						while ($team_data = $get_user->fetch_assoc()) {
							echo "<option value=".$team_data[id]." ";
							if ($team_data[id] == $issue_data[assignee]) {
								echo "selected=\"selected\"";
							}
							echo ">".$team_data[username]."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php
				echo $issue_data[date_created]." - ".$creator[username];
				?>
			</div>
			<div class="panel-body">
				<?php echo $issue_data[description];?>
			</div>
		</div>
		<?php
		
		while ($row = $issue_comments->fetch_assoc()) {
			echo "<div class=\"panel panel-default\">";
			echo "<div class=\"panel-heading\">";
			
			// Get developer name
			$dev_name = $conn->query("SELECT * FROM users WHERE id='{$row[created_by_developer]}' LIMIT 1;")->fetch_assoc();
			
			echo $row[created_at]." - ".$dev_name[username];
			echo "</div>";
			echo "<div class=\"panel-body\">";
			echo $row[comment];
			echo "</div>";
			echo "</div>";
		}
		
		?>
		<form method="post" action="add_comment.php?issueid=<?php echo $issue_data[id];?>">
			<div class="form-group">
				<label for="message-text" class="control-label">New Comment:</label>
				<textarea class="form-control" name="comment_text" required="required"></textarea>
			</div>
			<p><button type="submit" class="btn btn-primary">Add Comment</button></p>
		</form>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<!-- Bootstrap-datepicker 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
	-->
	<script>
	$(document).ready(function() {
		/*
		$('#datePicker').datepicker({
			autoclose: true,
			todayHighlight: true,
		});
		// set date to issue due date from database "Date(year,month-1,day)"
		$("#datePicker").datepicker('setDate', new Date(2016,6,29));
		*/
	});
	</script>
<?php
$conn->close();
?>
</body>
</html>
