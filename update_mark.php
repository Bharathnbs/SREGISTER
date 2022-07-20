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
         $student_register =mysqli_query($connection,'SELECT * FROM student_register');
         $subjectsQuery =mysqli_query($connection,'SELECT * FROM subjects');

         $subjects = [];
         while($row = mysqli_fetch_array($subjectsQuery)) {
            $subjects[] = $row;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_mark</title>
</head>
<body>
    <form action="update_mark.php" method="post">
        <label name="students">STUDENTS</label><br>
        <select name="student_id" id="">
           <?php
               while($row = mysqli_fetch_array($student_register)) {
                echo "<option value='{$row['sID']}'>{$row['sname']} </option>";
               }
           ?>

        </select>
        <table>
            <tr>
                <th>SUBJECT</th>
                <th>MARK</th>
            </tr>

            <tr>
                <td>
                    <select name="subject_1" >
                    <?php
                        foreach($subjects as $sub) {
                            echo "<option value='{$sub['id']}'>{$sub['name']} </option>";
                        }
                    ?>
                    </select>
                </td>
                <td>
                  <input type="number" name="mark_1" value="0" placeholder ="MARK"/>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="subject_2" >
                    <?php
                        foreach($subjects as $sub) {
                            echo "<option value='{$sub['id']}'>{$sub['name']} </option>";
                        }
                    ?>
                    </select>
                </td>
                <td>
                  <input type="number" name="mark_2" value="0" placeholder ="MARK"/>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="subject_3" >
                    <?php
                        foreach($subjects as $sub) {
                            echo "<option value='{$sub['id']}'>{$sub['name']} </option>";
                        }
                    ?>
                    </select>
                </td>
                <td>
                  <input type="number" name="mark_3" value="0" placeholder ="MARK"/>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="subject_4" >
                    <?php
                        foreach($subjects as $sub) {
                            echo "<option value='{$sub['id']}'>{$sub['name']} </option>";
                        }
                    ?>
                    </select>
                </td>
                <td>
                  <input type="number" name="mark_4" value="0" placeholder ="MARK"/>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="subject_5" >
                    <?php
                        foreach($subjects as $sub) {
                            echo "<option value='{$sub['id']}'>{$sub['name']} </option>";
                        }
                    ?>
                    </select>
                </td>
                <td>
                  <input type="number" name="mark_5" value="0" placeholder ="MARK"/>
                </td>
            </tr>
             
            
            
        </table>
          <input type="submit" value="save"/>

    </form>
    <a href="index.php">go to index page</a>
    <?php
         if($_SERVER['REQUEST_METHOD'] == "POST") 
         {
            // echo print_r($_POST);
            if (isset($_POST['mark_1']) && $_POST['mark_1'] != 0 && $_POST['mark_1'] != '0' && !empty($_POST['mark_1'])) mysqli_query($connection,"INSERT INTO student_mark (subject_id,student_id,mark) VALUES ('{$_POST['subject_1']}','{$_POST['student_id']}','{$_POST['mark_1']}')");
            if (isset($_POST['mark_2']) && $_POST['mark_2'] != 0 && $_POST['mark_2'] != '0' && !empty($_POST['mark_1'])) mysqli_query($connection,"INSERT INTO student_mark (subject_id,student_id,mark) VALUES ('{$_POST['subject_2']}','{$_POST['student_id']}','{$_POST['mark_2']}')");
            if (isset($_POST['mark_3']) && $_POST['mark_3'] != 0 && $_POST['mark_3'] != '0' && !empty($_POST['mark_1'])) mysqli_query($connection,"INSERT INTO student_mark (subject_id,student_id,mark) VALUES ('{$_POST['subject_3']}','{$_POST['student_id']}','{$_POST['mark_3']}')");
            if (isset($_POST['mark_4']) && $_POST['mark_4'] != 0 && $_POST['mark_4'] != '0' && !empty($_POST['mark_1'])) mysqli_query($connection,"INSERT INTO student_mark (subject_id,student_id,mark) VALUES ('{$_POST['subject_4']}','{$_POST['student_id']}','{$_POST['mark_4']}')");
            if (isset($_POST['mark_5']) && $_POST['mark_5'] != 0 && $_POST['mark_5'] != '0' && !empty($_POST['mark_1'])) mysqli_query($connection,"INSERT INTO student_mark (subject_id,student_id,mark) VALUES ('{$_POST['subject_5']}','{$_POST['student_id']}','{$_POST['mark_5']}')");
         }  

    ?>
     
</body>
</html>