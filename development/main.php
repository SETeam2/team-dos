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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>team DOS - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="lib/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="lib/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include('project_bar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Main Dashboard <small> Overview </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">16</div>
                                        <div>Messages</div>
                                    </div>
                                </div>
                            </div>
                            <a href="chat.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Task</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../patrick/pat_2/login45.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa fa-bell fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
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

$userid    = $_SESSION['user']['id'];
$useremail = $_SESSION['user']['email'];

$sql_select_projects_id = "select COUNT(id) as count from issues where status <> 'Completed' AND assignee = '$userid'";

if ($result = $conn->query($sql_select_projects_id)) {
    if ($result->num_rows > 0) {                        
        while ($row = $result->fetch_array()) {
            echo $row["count"];
        }   
    }
}

$conn->close();
?>
                                        </div>
                                        <div>Issues</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <form method="post" action="join_project.php">
   <!-- /.row -->
                <h1 class="page-header">
                    Join a project
                </h1>

                <div class="well">
                <select name="projecid" class="form-control">
  <option value='0'>Select a project to Join</option>


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

$sql_query = "SELECT * FROM projects";

if ($result = $conn->query($sql_query)) {
    if ($result->num_rows > 0) {                        
        while ($row = $result->fetch_array()) {
            echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
        }   
    }
}

$conn->close();
?>
</select>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> Join Project</button>
                </form>
 

 <form method="post" action="create_project.php">
   <!-- /.row -->
                <h1 class="page-header">
                    Create a project
                </h1>

                <div class="well">
                <input class="form-control" placeholder="Project Name" name="project_name" type="text" required>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> Create Project</button>
                </form>

             
    <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="lib/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="lib/js/plugins/morris/raphael.min.js"></script>
    <script src="lib/js/plugins/morris/morris.min.js"></script>
    <script src="lib/js/plugins/morris/morris-data.js"></script>
    
    
    <script type="text/javascript">
        $("#logout").click(function(){
            var exit = confirm("Are you sure you want to leave?");
            if(exit==true){window.location = 'logout.php';}      
        });
    </script>



</body>

</html>
