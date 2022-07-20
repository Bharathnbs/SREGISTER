<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mark_attendance</title>
</head>
<body>
    <?php

    // echo print_r($_POST);
       
    
        $hostname ="localhost";
            $username ="leanhost";
            $password ="1234";
    
            $connection =mysqli_connect($hostname,$username,$password);
        
            $db_select =mysqli_select_db($connection,'student_details');
    
            $student_register = mysqli_query($connection,"SELECT * FROM student_register");


            
    ?>
<form action="markattendance.php" method="post">
    <select name="student_id">
      <?php  while($row = mysqli_fetch_array($student_register)) {
        echo "<option value='{$row['sID']}'>{$row['sname']} </option>";
      }
      ?>  
    </select>

    <input type="date" name="date" />

<select name="status">
        <option value="P">present</option>
        <option value="A">appsent</option>
    </select>
     
    <input type="submit" value="Submit"/>

    </form>

    <?php
           if($_SERVER['REQUEST_METHOD']=="POST")
           {
            
             $attendance =mysqli_query($connection,"INSERT INTO attendance (student_id,date,status) VALUE ('{$_POST['student_id']}','{$_POST['date']}','{$_POST['status']}')");
           }


    ?>


</body>
</html>








