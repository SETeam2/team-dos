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
    echo '<li><a href="Issue_Tracker.php?projectID='.$row["id"].'">'.$row["name"].'</a></li>';
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