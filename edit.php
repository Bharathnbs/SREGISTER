<?php
        session_start();
        if(!isset($_SESSION['IsLoggedIn']))
        {
            header("Location: login.php");
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit page</title>
</head>
<body>
    <?php 

    $id =$_GET['sid'];

    $hostname ="localhost";
    $username ="leanhost";
    $password ="1234";
    
    $connection =mysqli_connect($hostname,$username,$password);

    $db_select =mysqli_select_db($connection,'student_details');

    $query= mysqli_query($connection,"SELECT * FROM student_register WHERE sID=$id");
        
    while($row=mysqli_fetch_array($query))
    {
        $sname =$row['sname'];
        $fname =$row['fname'];
        $mname =$row['mname'];
        $contectno  =$row['contectno'];
        $aatherno =$row['aatherno'];
        $bloodgroup =$row['bloodgroup'];
        $addresss =$row['addresss'];
       
    }

    ?>
                 <!-- this code show a data in text filed -->
    
<form action="edit.php?sid=<?php echo $_GET['sid']; ?>" method="post">
            <label for="sname">student name</label><br>
            <input type="text" name="sname"  value="<?php echo $sname ?>"/><br>
            <label for="sname">father name</label><br>
            <input type="text" name="fname" value="<?php echo $fname ?>"/><br>
            <label for="sname">mother name</label><br>
            <input type="text" name="mname" value="<?php echo $mname ?>"/><br>
            <label for="sname">contectno</label><br>
            <input type="text" name="contectno" value="<?php echo $contectno ?>" /><br>
            <label for="sname">aatherno</label><br>
            <input type="text" name="aatherno" value="<?php echo $aatherno ?>"/><br>
            <label for="sname">bloodgroup</label><br>
            <input type="text" name="bloodgroup" value="<?php echo $bloodgroup ?>"/><br>
            <label for="sname">address</label><br>
            <input type="text" name="addresss" value="<?php echo $addresss ?>"/><br>
            <input type="submit" value="sumbit" name="sumbit"><br>
            
        </form>
        <?php

        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $sname =$_POST['sname'];
            $fname =$_POST['fname'];
            $mname =$_POST['mname'];
            $contectno =$_POST['contectno'];
            $aatherno =$_POST['aatherno'];
            $bloodgroup =$_POST['bloodgroup'];
            $addresss =$_POST['addresss'];
           
              $id =$_GET['sid'];
               
               $hostname ="localhost";
               $username ="leanhost";
               $password ="1234";
           
               $connection =mysqli_connect($hostname,$username,$password);
           
               $db_select =mysqli_select_db($connection,'student_details');
            //    if(!$db_select)
            //    {
            //     echo "not connect";
            //    }
           
               $query= mysqli_query($connection,"UPDATE student_register  SET sname='$sname',fname='$fname',mname='$mname',contectno='$contectno',aatherno='$aatherno',bloodgroup='$bloodgroup',addresss='$addresss' WHERE sID='$id'");
            //    if($query)
            //    {
            //        echo "update  successfully";
            //    }
        }


?>
   <a href="index.php">go to index page</a> 
</body>
</html>