<?php include('php_components/session_validation') ?>

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

<<<<<<< HEAD
<div id="wrapper">

    <?php include('php_components/navigation_bar.php') ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        My Dashboard
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php include('queries/task_count') ?></div>
                                    <div>Tasks</div>
                                </div>
                            </div>
=======
    <div id="wrapper">

        <?php include('php_components/navigation_bar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My Dashboard
                        </h1>
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
                                        <div>Messages</div>
                                    </div>
                                </div>
                            </div>
                            <a href="chat.php">
                                <div class="panel-footer">
                                    <span class="pull-left">My messages</span>
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
                                        <div class="huge"><?php include('queries/task_count') ?></div>
                                        <div>Tasks</div>
                                    </div>
                                </div>
                            </div>
                            <?php include('queries/generate_task_link') ?>
>>>>>>> origin/master
                        </div>
                        <?php include('queries/generate_task_link') ?>
                    </div>
<<<<<<< HEAD
                </div>
                <div class="col-sm-6">
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
=======
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
                            <?php include('queries/generate_issue_link') ?>
>>>>>>> origin/master
                        </div>
                        <?php include('queries/generate_issue_link') ?>
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

<<<<<<< HEAD
                        if ($result = $conn->query($sql_query)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
                                }
                            }
                        }
=======
if ($result = $conn->query($sql_query)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
        }
    }
}
>>>>>>> origin/master

                        $conn->close();
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> Join </button>
            </form>

            <form method="post" action="leave_project.php">
                <!-- /.row -->
                <h1 class="page-header">
                    Leave a project
                </h1>

                <div class="well">
                    <select name="projecid" class="form-control">
                        <option value='0'>Select the project you want to leave</option>


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


                        $sql_query = "SELECT projects.id, users.id as user_id, users.username,users.email,users.last_activity,projects.name  
                FROM project_developers  
                JOIN users  ON project_developers.user_id=users.id  JOIN projects  ON project_developers.project_id=projects.id  
                where users.email='$useremail' 
                ORDER BY projects.id; ";


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
                <button type="submit" class="btn btn-primary pull-right"> Leave </button>
            </form>

            <form method="post" action="create_project.php">
                <!-- /.row -->
                <h1 class="page-header">
                    Create a project
                </h1>

                <div class="well">
                    <input class="form-control" placeholder="Project Name" name="project_name" type="text" required>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> Create </button>
            </form>

            <form method="post" action="edit_project.php">
                <!-- /.row -->
                <h1 class="page-header">
                    Edit project name
                </h1>

                <div class="well">
                    <select name="projecid" class="form-control" style="margin-bottom:15px;">
                        <option value='0'>Select the project you want change name</option>


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

                        $sql_query = "SELECT projects.id, users.id as user_id, users.username,users.email,users.last_activity,projects.name  
                FROM project_developers  
                JOIN users  ON project_developers.user_id=users.id  JOIN projects  ON project_developers.project_id=projects.id  
                where users.email='$useremail' 
                ORDER BY projects.id; ";

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

                    <input class="form-control" placeholder="New Project Name" name="project_name" type="text" required>

                </div>
                <button type="submit" class="btn btn-primary pull-right"> Edit </button>
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
