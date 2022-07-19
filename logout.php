<?php
    session_start();
    unset($_SESSION['IsLoggedIn']);
    if(!isset($_SESSION['IsLoggedIn']))
    {
       header("Location: login.php");
    }
    
?>