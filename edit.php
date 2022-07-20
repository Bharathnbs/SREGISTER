<?php
        session_start();
        if(!isset($_SESSION['IsLoggedIn']))
        {
            header("Location: login.php");
        }

        if(empty($_GET['sid']))
        {
         header("Location: index.php");
        }

        $id =$_GET['sid'];

    $hostname ="localhost";
    $username ="leanhost";
    $password ="1234";
    
    $connection =mysqli_connect($hostname,$username,$password);

    $db_select =mysqli_select_db($connection,'student_details');

        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $sname =$_POST['sname'];
            $fname =$_POST['fname'];
            $mname =$_POST['mname'];
            $contectno =$_POST['contectno'];
            $aatherno =$_POST['aatherno'];
            $bloodgroup =$_POST['bloodgroup'];
            $addresss =$_POST['addresss'];
            $course =$_POST['courseID'];

           
              $id =$_GET['sid'];
               
               $hostname ="localhost";
               $username ="leanhost";
               $password ="1234";
           
               $connection =mysqli_connect($hostname,$username,$password);
           
               $db_select =mysqli_select_db($connection,'student_details');
            
           
               $query= mysqli_query($connection,"UPDATE student_register  SET sname='$sname',fname='$fname',mname='$mname',contectno='$contectno',aatherno='$aatherno',bloodgroup='$bloodgroup',addresss='$addresss',courseID='{$course}' WHERE sID='$id'");
            //    if($query)
            //    {
            //        echo "update  successfully";
            //    }
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

    

    $query= mysqli_query($connection,"SELECT * FROM student_register WHERE sID=$id");
    $courses =mysqli_query($connection,'SELECT * FROM courses');
    
    while($row=mysqli_fetch_array($query))
    {
        $sname =$row['sname'];
        $fname =$row['fname'];
        $mname =$row['mname'];
        $contectno  =$row['contectno'];
        $aatherno =$row['aatherno'];
        $bloodgroup =$row['bloodgroup'];
        $addresss =$row['addresss'];
        $course =$row['courseID'];
       
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
            <label for="courseID">Course</label><br>
            <select name="courseID" >
                <?php while($rows =mysqli_fetch_array($courses))
                {
                    $selected = $rows['id'] == $course ? 'selected' : '';
                    echo "<option {$selected} value='{$rows['id']}'>{$rows['course']}</option>";
                }

                ?>

            </select><br>
            <input type="submit" value="sumbit" name="sumbit"><br>
            
        </form>
        <?php

        
        
?>


   <a href="index.php">go to index page</a> 
</body>
</html>