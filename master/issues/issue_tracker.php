<?php
session_name('teamdos');
session_start ();
if (! isset($_SESSION['LAST_ACTIVITY']) || (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    $_SESSION = array();
    unset($_SESSION);
    session_unset();     
    session_destroy(); 
    header ( "Location: login.html" );
}

if (! isset ( $_SESSION['user']['name'] )) {
    header ( "Location: login.html" ); // Redirect the user
}
$_SESSION['LAST_ACTIVITY'] = time();

if (! isset($_GET['projectID'])){
    header ( "Location: ../main.html" );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Issue Tracker</title>

    <!-- Bootstrap Core CSS -->
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../lib/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="../lib/css/plugins/morris.css" rel="stylesheet">-->

    <!-- Datatables CSS 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>-->

    <!-- Custom Fonts -->
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">team DOS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="chat.php"><i class="fa fa-comments"></i></a></li>
 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
echo $_SESSION['user']['name'] ;
?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a id="logout" href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="main.php"><i class="fa fa-fw fa-dashboard"></i> Main Dashboard</a>
                    </li>

                    <li>
                        <a href="../patrick/pat_2/login45.php"><i class="fa fa-fw fa-tasks"></i> Task</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bell"></i> Issue Tracker <i class="fa fa-fw fa-caret-down"></i></a>
                         <ul id="demo">
<?php

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

$useremail = $_SESSION['user']['email'];

$sql_select_projects_id = "SELECT projects.id, users.id as user_id, users.username,users.email,users.last_activity,projects.name  
                    FROM project_developers  
                    JOIN users  ON project_developers.user_id=users.id  JOIN projects  ON project_developers.project_id=projects.id  
                    where users.email='$useremail' 
                    ORDER BY projects.id; ";

if ($result = $conn->query($sql_select_projects_id)) {
    if ($result->num_rows > 0) {                        
        while ($row = $result->fetch_array()) {
            echo '<li><a href="issue_tracker.php?projectID='.$row["id"].'">'.$row["name"].'</a></li>';
        } 
    }
}

$conn->close();
?>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="file_sharing.php"><i class="fa fa-fw fa-upload"></i> Shared Resources</a>
                    </li>

                    <li>
                        <a href="chat.php" ><i class="fa fa-fw fa-comments"></i> Group Chats </a>
                       
                    </li>  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
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
$query_info = "SELECT * FROM issues WHERE id_project='{$_GET['projectID']}';";
$result = $conn->query($query_info);

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
                                            <button type="submit" class="btn btn-primary">Create Issue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div> 
                
            </div> 
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../lib/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../lib/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../lib/js/plugins/morris/raphael.min.js"></script>
    <script src="../lib/js/plugins/morris/morris.min.js"></script>
    <script src="../lib/js/plugins/morris/morris-data.js"></script>
    
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    
    <script type="text/javascript">
        $("#logout").click(function(){
            var exit = confirm("Are you sure you want to leave?");
            if(exit==true){window.location = 'logout.php';}      
        });

        $(document).ready(function() {
            $('#example').DataTable( {
               "order": [ 4, 'desc']
            } );
    </script>



</body>

</html>
