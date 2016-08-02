<?php
include 'file_sharing/uploading/dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Shared Resources</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Upload Shared Resources</label>
</div>
<div id="body">
 <form action="uploading/upload.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="uploading/view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
 }
 ?>
</div>
</body>
</html>
