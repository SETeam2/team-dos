<?php
session_name('teamdos');
session_start();

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: ../login.html" ); // Redirect the user
}

// Sample Session variables
$_SESSION['current_project'] = 1;
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

<title>Issue Tracker</title>

<!-- Bootstrap core CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<!-- Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css" />

<!-- Custom styles -->
<link href="issue_tracker.css" rel="stylesheet">

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

// query issue table
$query_info = "SELECT * FROM issues WHERE id_project='{$_SESSION['current_project']}';";
$result = $conn->query($query_info);

// query current project users
$get_users_query = "SELECT users.username, users.id FROM project_developers JOIN users ON project_developers.user_id=users.id JOIN projects ON project_developers.project_id=projects.id WHERE project_id='{$_SESSION['current_project']}'";
$get_user = $conn->query($get_users_query);

// query current project name
$curr_project = $conn->query("SELECT * FROM projects WHERE id='{$_SESSION['current_project']}';")->fetch_assoc();

?>

<body>
	<script language="javascript" type="text/javascript">
		<!-- 
//Browser Support Code
function ajaxFunction(){
   var ajaxRequest;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
   // Create a function that will receive data
   // sent from the server and will update
   // div section in the same page.
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   
   // Now get the value from user and pass it to
   // server script.
   var title = document.getElementById('Title').value;
   var priority = document.getElementById('Priority').value;
   var assignee = document.getElementById('Assignee').value;
   var description = document.getElementById('Description').value;
   var queryString = "?title=" + age ;
   
   queryString +=  "&wpm=" + wpm + "&sex=" + sex;
   ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
   ajaxRequest.send(null); 
}
//-->
	</script>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="../main.php"><?php echo $curr_project[name]; ?></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#">Tasks</a></li>
				<li><a href="#">Messages</a></li>
				<li class="active"><a href="#">Issues</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']['name']; ?></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="page-header">
			<h1>Issue Tracker</h1><br>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Create New Issue
			</button>
		</div>
		
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Issue #</th>
                <th>Title</th>
                <th>Priority</th>
				<th>Status</th>
                <th>Last Updated</th>
                <th>Assignee</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	// fetch associative array
        	while ($row = $result->fetch_assoc()) {
        		echo "<tr>";
        		echo "<td><a href=\"issue_test.php?issueid=".$row[id]."\">".$row[id]."</a></td>";
                echo "<td>".$row[title]."</td>";
                echo "<td>".$row[priority]."</td>";
                echo "<td>".$row[status]."</td>";
                echo "<td>".$row[last_updated]."</td>";

				// get assignee name
				$issue_assignee = $conn->query("SELECT * FROM users WHERE id='{$row[assignee]}';")->fetch_assoc();
                echo "<td>".$issue_assignee[username]."</td>";
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
					<h4 class="modal-title" id="myModalLabel">Create New Issue</h4>
				</div>
				<form method="post" action="add_issue.php">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label">Title:</label>
							<input type="text" class="form-control" name="title" required="required">
						</div>
						<div class="form-group">
							<label class="control-label">Priority:</label>
							<select class="form-control" name="priority" required="required">
								<option value="Low">Low</option>
								<option value="Medium">Medium</option>
								<option value="High">High</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Assignee:</label>
							<select class="form-control" name="assignee" required="required">
								<?php
								while ($team_data = $get_user->fetch_assoc()) {
									echo "<option value=".$team_data[id].">".$team_data[username]."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Description:</label>
							<textarea class="form-control" name="description" required="required"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" >Create Issue</button>
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
