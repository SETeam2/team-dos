
<?php
session_name('teamdos');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Team Dos</title>


    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="lib/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="lib/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reset your Password</h3>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="new_password.php">
                            <fieldset>
                             	<input name="uid" type="hidden" value="<?php echo $_GET["uid"]; ?>">
                                
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" placeholder="New Password" name="password" type="password" value="" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Reset</button>                             
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="lib/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/js/bootstrap.min.js"></script>


</body>

</html>
