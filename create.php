<?php
        session_start();
        if(!isset($_SESSION['IsLoggedIn']))
        {
            header("Location: login.php");
        }

        $hostname ="localhost";
        $username ="leanhost";
        $password ="1234";

        $connection =mysqli_connect($hostname,$username,$password);
    
        $db_select =mysqli_select_db($connection,'student_details');
        $courses =mysqli_query($connection,'SELECT * FROM courses');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
         <form action="create.php" method="post">
            <label for="sname">student name</label><br>
            <input type="text" name="sname" /><br>
            <label for="sname">father name</label><br>
            <input type="text" name="fname" /><br>
            <label for="sname">mother name</label><br>
            <input type="text" name="mname" /><br>
            <label for="sname">contectno</label><br>
            <input type="text" name="contectno" /><br>
            <label for="sname">aatherno</label><br>
            <input type="text" name="aatherno" /><br>
            <label for="sname">bloodgroup</label><br>
            <input type="text" name="bloodgroup" /><br>
            <label for="sname">address</label><br>
            <input type="text" name="addresss" /><br>
            <label for="courseID">Course</label><br>
            <select name="courseID" >
                <?php while($rows =mysqli_fetch_array($courses))
                {
                    echo "<option value='{$rows['id']}'>{$rows['course']}</option>";
                }

                ?>

            </select><br>
            <input type="submit" value="sumbit" name="sumbit"><br>
            
        </form>

        <a href="index.php">back to index</a>
        <!-- <a href="http://localhost/guvi/sregister/index.php"></a> -->
        <?php
        // echo print_r($_SERVER['REQUEST_METHOD']);

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                $sname =$_POST['sname'];
                $fname =$_POST['fname'];
                $mname =$_POST['mname'];
                $contectno =$_POST['contectno'];
                $aatherno =$_POST['aatherno'];
                $bloodgroup =$_POST['bloodgroup'];
                $addresss =$_POST['addresss'];
                $course =$_POST['courseID'];

                $hostname ="localhost";
                $username ="leanhost";
                $password ="1234";

                $connection =mysqli_connect($hostname,$username,$password);
            
                $db_select =mysqli_select_db($connection,'student_details');

                $query =mysqli_query($connection,"INSERT INTO student_register(sname,fname,mname,contectno,aatherno,bloodgroup,addresss,courseID) VALUES ('$sname','$fname','$mname','$contectno','$aatherno','$bloodgroup','$addresss','{$course}')");
                if($query)
                {
                    echo "update A DATAs";
                }
            }
        ?>
</body>
</html>