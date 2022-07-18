    <?php
     
    $id =$_GET['sid'];
    
    $hostname ="localhost";
        $username ="leanhost";
        $password ="1234";

        $connection =mysqli_connect($hostname,$username,$password);
    
        $db_select =mysqli_select_db($connection,'student_details');

        $query= mysqli_query($connection,"SELECT * FROM student_register WHERE sID=$id");

        while($row = mysqli_fetch_array($query))
        {
            echo $row['sID']."<br>"
               . $row['sname'] ;
        }


    ?>