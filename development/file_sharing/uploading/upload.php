<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

include 'dbconfig.php';
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO dbuploads.tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
  
  // Perform Query
$result = mysql_query($sql);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
}
  
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='../new_file.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  
  var file = "<?php echo $file; ?>";
  var file_loc = "<?php echo $file_loc; ?>";
  var final_file = "<?php echo $final_file; ?>";
  var destination = "<?php echo $folder.$final_file; ?>";
  
  alert('error while uploading file');
  alert("file= " + file +
  		"\nfile location= " + file_loc +
  		"\nfinal file= " + final_file +
  		"\ndestination= " + destination);
        window.location.href='../new_file.php?fail';
        </script>
  <?php
 }
}
?>
