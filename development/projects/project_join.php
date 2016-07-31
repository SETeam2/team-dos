<?php include('../php_components/session_validation') ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Join New Project</title>


    <link href="../nan/lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../nan/lib/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../nan/lib/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../nan/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <style>
            html,body {
                margin: 0px;
                overflow: hidden;
                font-family:arial;
                width:100%;
                height:100%;
            }
            h1{
                margin:0;
            }

            a {
            }
            #canvas{
                width:100%;
                height:100%;
                overflow: hidden;
                position:absolute;
                top:0;
                left:0;            
            }
            .canvas-wrap{
                position:absolute;
                width:100%;
                height:100%;
                
            }
            div.canvas-content{
                position:absolute;
                text-align:center;
            }
            .container{
                margin-top: 100px;
            }
        </style>

</head>

<body>
    
    <div class="canvas-content">
    </div>
    <div id="canvas" class="gradient"></div>
        

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enter project name and password!</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="project_join.php">
                            <fieldset>
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" placeholder="Project" name="project" type="project" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>

                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>

                                <div class="row border-top">
                                </div>
                                <a href="new_project.html" class="btn btn-lg btn-info btn-block">Create New Project</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../nan/lib/js/jquery.js"></script>

    <script src="../nan/lib/js/three.min.js"></script>
  
    <!-- Helpers -->
    <script src="../nan/lib/js/projector.js"></script>
    <script src="../nan/lib/js/canvas-renderer.js"></script>

    <!-- Visualitzation adjustments 
    <script src="../nan/lib/js/3d-lines-animation.js"></script>
    <script src="../nan/lib/js/color.js"></script>-->


    <!-- Bootstrap Core JavaScript -->
    <script src="../nan/lib/js/bootstrap.min.js"></script>
    <script src="../nan/lib/fbapp/fb.js"></script>



</body>

</html>
