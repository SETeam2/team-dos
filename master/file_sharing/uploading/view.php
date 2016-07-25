<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

include 'dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shared Resources</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Shared Resources</label>
</div>
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4"><label><a href="../new_file.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php

//issue with accessing dbconfig.php via 'include', so manually entered here    
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs673";
$dbname = "dbuploads";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');


 $sql="SELECT * FROM dbuploads.tbl_uploads";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
</div>
</body>
</html>