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
?>
 
    <?php
     
    $id =$_GET['sid'];
    
    $hostname ="localhost";
        $username ="leanhost";
        $password ="1234";

        $connection =mysqli_connect($hostname,$username,$password);
    
        $db_select =mysqli_select_db($connection,'student_details');

        $details = mysqli_query($connection,"SELECT * FROM student_register WHERE sID=$id");
        $attendances = mysqli_query($connection,"SELECT * FROM attendance WHERE student_id=$id");
        $student_mark = mysqli_query($connection,"SELECT * FROM student_mark JOIN subjects ON student_mark.subject_id = subjects.id  WHERE student_id=$id");
       
        while($row = mysqli_fetch_array($details))
        {
            echo $row['sID']."<br>"
               . $row['sname'] ;
        }

        echo '<br>';

        while($row = mysqli_fetch_array($attendances))
        {
            $color = $row['status'] == 'A' ? 'red' : 'green';
            echo "<div style='background-color:{$color}'>{$row['date']} - {$row['status']}<br></div>";
        }
        echo '<br>';

        while($row = mysqli_fetch_array($student_mark))
        {
            echo "{$row['name']} {$row['mark']}<br>";
        }  
    ?>