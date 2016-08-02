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
    <link rel="icon" href="">

    <title>User Story</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="story.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="$
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <a class="navbar-brand" href="#">Project name</a>
    </div>
	<div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Messages</a></li>
            <li class="active"><a href="#">Story</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    <div class="page-header">
      <h1>Story Page</h1><br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create New Story</button>
    </div>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr><th>ID</th><th>Story Title</th><th>Owner</th><th>Date Created</th><th>Description</th></tr>
    </thead>
    <tbody>

//might need to remove table


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

//need to update this later
      $sql_select_story = "SELECT story.id, story.story_name, story.story_description
                          FROM story;";

      if ($result = $conn->query($sql_select_story)) {
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_array()) {
                  echo '<li><a href="story.php?projectID='.$row["id"].'">'.$row["name"].'</a></li>';
              }
          }
      }

      $conn->close();
      ?>

        </tbody>
    </table>
    </tbody>
 </table>
 </div><!-- /.container -->

     <!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog" role="document">
                     <div class="modal-content">
                             <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&time$
                                     <h4 class="modal-title" id="myModalLabel">Create New Story</h4>
                             </div>
                             <div class="modal-body">
                              <form>
                                  <div class="form-group">
                                      <label for="recipient-name" class="control-label">Title:</label>
                                      <input type="text" class="form-control" id="recipient-name">
                                  </div>
                                  <fieldset class="form-group">
                                      <label for="priority">Priority:</label>
                                      <select class="form-control" id="priority_select">
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                      </select>
                                  </fieldset>
                                  <fieldset class="form-group">
                                      <label for="assignee">Assignee:</label>
                                                     <select class="form-control" id="assignee_select">
                                                             <option>Patrick Querido</option>
                                                             <option>Adam Mullarkey</option>
                                                             <option>Albert Lee</option>
                                                             <option>Philippe Bouzy</option>
                                                             <option>Wan Chen</option>
                                                             <option>Henry Huang</option>
                                                             <option>Nan Sun</option>
                                                     </select>
                                             </fieldset>
                                             <div class="form-group">
                                                     <label for="message-text" class="control-label">Description:</label>
                                                     <textarea class="form-control" id="message-text"></textarea>
                                             </div>
                                     </form>
                             </div>
                             <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                     <button type="button" class="btn btn-primary" data-dismiss="modal">Create Story</button>
                             </div>
                     </div>
             </div>
     </div>

 <!-- Bootstrap core JavaScript -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

         <!-- DataTables -->
         <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
         <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

         <script>
         $(document).ready(function() {
                 $('#example').DataTable();
         } );
         </script>

   </body>
 </html>
