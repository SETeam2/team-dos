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
                <a class="navbar-brand" href="main.php">team DOS</a>
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


                <?php
                    if(isset($_GET['projectID'])){
                        echo '<li><a href="http://52.203.18.172/master/chat.php"><i class="fa fa-wechat"></i>  Public Chats</a></li>';
                    }else{
                        echo '<li class="active"><a href="http://52.203.18.172/master/chat.php"><i class="fa fa-wechat"></i>  Public Chats</a></li>';
                    }
                ?>
                       
                    
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

            if($_GET['projectID'] == $row["id"]){
                echo '<li class="active"><a href="?projectID='.$row["id"].'"><i class="fa fa-users"></i> Group '.$row["name"].'</a></li>';



                $userid = $row['user_id'];

                $sql_user = "SELECT users.id,users.username  
                                FROM project_developers  
                                JOIN users  ON project_developers.user_id=users.id  JOIN projects  ON project_developers.project_id=projects.id  
                                where project_developers.project_id='".$_GET['projectID']."'
                                AND users.email<>'$useremail'";

                if ($result2 = $conn->query($sql_user)) {
                    while ($row2 = $result2->fetch_array()) {

                        
                        if($_GET['toID'] == $row2["id"]){
                            echo '<li class="active"><a href="?projectID='.$row["id"].'&fromID='.$userid.'&toID='.$row2["id"].'">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>  '.$row2["username"].'</a></li>';
                        }else{
                            echo '<li ><a href="?projectID='.$row["id"].'&fromID='.$userid.'&toID='.$row2["id"].'">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>  '.$row2["username"].'</a></li>';
                        }
                 
                    }

                }
    



            }else{
                echo '<li><a href="?projectID='.$row["id"].'"><i class="fa fa-users"></i>  Group '.$row["name"].'</a></li>';
            }
     
        }
   
    }
}

$conn->close();
?>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Chats <small>  </small>
                        </h1>    
                    </div>
                </div>
                <!-- /.row --> 

            <div id="my-chat"> 
                <iframe src=<?php 
                    $url = "chat/chat.html";
                    if(isset($_GET['projectID'])){
                        $url .=  "?projectID=".$_GET['projectID'];
                    }else{
                        $url .=  "?projectID=0";
                    }
                    if(isset($_GET['fromID'])){
                        $url .=  "&fromID=".$_GET['fromID'];
                    }
                    if(isset($_GET['toID'])){
                        $url .=  "&toID=".$_GET['toID'];
                    } 
                    echo $url;               
                ?> frameBorder="0" width="100%" height="632px" class="myIframe"></iframe> 
            </div>
            
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
        $(window).load(function() {
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });
        $("#logout").click(function(){
            var exit = confirm("Are you sure you want to leave?");
            if(exit==true){window.location = 'logout.php';}      
        });
    </script>



</body>

</html>
