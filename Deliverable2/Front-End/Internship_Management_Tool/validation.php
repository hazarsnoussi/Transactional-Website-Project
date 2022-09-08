<?php
// $db_host = "hazardatabase.c6aoxvbgk7gd.ca-central-1.rds.amazonaws.com";
include_once 'connection.php';
    if($connection) {
        if (isset($_POST['login']) && isset($_POST['password'])) {    
            $login = $_POST['login'];
            $password =  $_POST['password'];
            $sql = "SELECT * FROM student WHERE (studentID = '$login' AND password = '$password' AND isActive = 1)";   
            $query = mysqli_query($connection,$sql);   
            $row = mysqli_fetch_assoc($query);
                if(mysqli_num_rows($query) == 1)//if the user exists
                {
                $username = $row['studentID'];
                session_start();
                $_SESSION['uid'] = $username; 
                $_SESSION['fullName'] = $row['firstName']." ".$row['lastName'];
                }
                if (isset($_SESSION['uid'])) {header("location:home.php"); }
                else {echo "user non identified";
                    header("location:index.html");exit;}
            }
    }
?>