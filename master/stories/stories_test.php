<?php include('../php_components/session_validation');

// Project GET variables
$_SESSION['current_project'] = $_GET['projectID'] ;//$_GET['projectID']
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

	<title>User Story</title>

	<!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

	<!-- Datatables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

	<!-- Bootstrap Datepicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css" />

	<!-- Custom styles
    <link href="issue_tracker.css" rel="stylesheet">-->

</head>

<?php
// variables

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

// query table
$query_info = "SELECT * FROM stories WHERE id_project='{$_GET['projectID']}';";
$result = $conn->query($query_info);

// query current project users
$get_users_query = "SELECT users.username, users.id FROM project_developers JOIN users ON project_developers.user_id=users.id JOIN projects ON project_developers.project_id=projects.id WHERE project_id='{$_GET['projectID']}'";
$get_user = $conn->query($get_users_query);

// query current project name
$curr_project = $conn->query("SELECT * FROM projects WHERE id='{$_GET['projectID']}';")->fetch_assoc();

?>

<body>

<div class="container-fluid">
	<!--<div class="page-header">-->
	<p>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create Story</button>
	</p><br>
	<!--</div>-->
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>Story ID #</th>
			<th>Story Name</th>
			<th>Description</th>
			<th>Assigned</th>
			<th>Last Updated</th>
		</tr>
		</thead>
		<tbody>
		<?php
		// fetch associative array
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td><a href=\"story_test.php?storyid=".$row[id]."\">".$row[id]."</a></td>";
			echo "<td>".$row[story_name]."</td>";
			echo "<td>".$row[story_description]."</td>";
			// get assignee name
			$issue_assignee = $conn->query("SELECT * FROM users WHERE id='{$row[created_by_developer]}';")->fetch_assoc();
			echo "<td>".$issue_assignee[username]."</td>";
			echo "<td>".$row[created_at]."</td>";
		}
		?>
		</tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">New Story</h4>
			</div>
			<form method="post" action="add_story.php">
			<input type="hidden" id="projectID" name="projectID" value="<?php 
                                    echo $_GET['projectID'];
                                    ?>"/>
				<div class="modal-body">

					<div class="form-group">
						<label class="control-label">Title</label>
						<input type="text" class="form-control" name="story_name" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">Description:</label>
						<textarea class="form-control" name="story_description" required="required"></textarea>
						
					</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- Bootstrap-datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"order": [ 4, 'desc']
		} );

		$('#datePicker').datepicker({
			autoclose: true
		});
	});
</script>
<?php
$conn->close();
?>
</body>
</html>
