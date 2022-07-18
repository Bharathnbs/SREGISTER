<?php
$id =$_GET['sid'];
    
    $hostname ="localhost";
    $username ="leanhost";
    $password ="1234";

    $connection =mysqli_connect($hostname,$username,$password);

    $db_select =mysqli_select_db($connection,'student_details');

    $query= mysqli_query($connection,"DELETE  FROM student_register WHERE sID=$id");
    if($query)
    {
        echo "delete the id successfully";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete page</title>
</head>
<body>
   <a href="index.php">go to index page</a> 
</body>
</html>