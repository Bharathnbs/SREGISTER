<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>
    
        <form action="login.php" method="post">
            <label >Username</label><br>
            <input type="text" name="username" /><br>
            <label >password</label><br>
            <input type="password" name="password" /><br>
            <input type="submit" value="login">
        </form>
    <?php

    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
          $u_name=$_POST['username'];
          $p_word=$_POST['password'];

          

        $hostname ="localhost";
        $username ="leanhost";
        $password ="1234";
       
        $connection =mysqli_connect($hostname,$username,$password);
       
        $db_select =mysqli_select_db($connection,'student_details');
       
        $query =mysqli_query($connection,"SELECT * FROM users");
        // if($query)
        // {
        //     echo "select the table";
        // }
       
        while($row=mysqli_fetch_array($query))
        {
           $uname=$row['username'];
           $psword=$row['password'];
        }
        // echo $u_name.'<br>';
        // echo $uname.'<br>';
        // echo $p_word.'<br>';
        // echo $psword.'<br>';


        if($uname==$u_name &&  $psword==$p_word)
        {
            // echo $u_name;
            // echo $p_word;
            $_SESSION['IsLoggedIn'] = true;
            header("Location: index.php");
        }
        else 
           echo "password miss match";
    
    }

    ?>
   
</body>
</html>