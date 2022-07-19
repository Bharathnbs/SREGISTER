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
    <title>index page</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>RegisterID</th>
            <th>student name</th>
            <th>father name</th>
            <th>mother name</th>
            <th>connect no</th>
            <th>aather no</th>
            <th>blood group</th>
            <th>address</th>
            <th>operation</th>
            
        </tr>
        <?php
        $hostname ="localhost";
        $username ="leanhost";
        $password ="1234";

        $connection =mysqli_connect($hostname,$username,$password);
    
        $db_select =mysqli_select_db($connection,'student_details');

        $result =mysqli_query($connection,'SELECT * FROM student_register');

        while($row = mysqli_fetch_array($result))
        {
            if(isset($row['sname']))
            {
                echo "<tr>
                <td>{$row['sID']}</td>
                <td><a href='show.php?sid={$row['sID']}'>{$row['sname']}</a></td>
                <td>{$row['fname']}</td>
                <td>{$row['mname']}</td>
                <td>{$row['contectno']}</td>
                <td>{$row['aatherno']}</td>
                <td>{$row['bloodgroup']}</td>
                <td>{$row['addresss']}</td>
                <td><a href='delete.php?sid={$row['sID']}'>delete</a><br><a href='edit.php?sid={$row['sID']}'>edit</a></td>
                </tr>";
            }
        }
        ?>
    </table>
   <a href="create.php">go to create page</a><br>   
   <a href="logout.php">logout</a>
</body>
</html>