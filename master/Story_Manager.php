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

<div id="wrapper">

    <?php include('php_components/navigation_bar.php') ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Task Tracker <small>
                            <?php
                            $servername = "localhost";
                            $db_username = "root";
                            $db_password = "cs673";
                            $db_name = "master";

                            $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $projectID = 0;
                            if(isset($_GET['projectID'])){
                                $projectID = $_GET['projectID'];
                            }

                            $sql_query = "SELECT * FROM projects WHERE id='$projectID' LIMIT 1";

                            if ($result = $conn->query($sql_query)) {
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_array();
                                    echo $row["name"];
                                }
                            }

                            $conn->close();
                            ?>
                        </small>
                    </h1>
                </div>
            </div>

            <div id="my-chat">
                <iframe src=<?php
                $url = "stories/display_test.php";
                if(isset($_GET['projectID'])){
                    $url .=  "?projectID=".$_GET['projectID'];
                }else{
                    $url .=  "?projectID=0";
                }

                echo $url;
                ?> frameBorder="0" width="100%" height="800px" class="myIframe"></iframe>
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
    $("#logout").click(function(){
        var exit = confirm("Are you sure you want to leave?");
        if(exit==true){window.location = 'logout.php';}
    });
</script>



</body>

</html>
