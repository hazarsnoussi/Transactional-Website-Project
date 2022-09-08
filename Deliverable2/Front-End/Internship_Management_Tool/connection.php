<?php 
$db_host="localhost";
$db_user = "root";
$db_pw = "";
$db_name = "internship_db";
$connection = mysqli_connect($db_host, $db_user, $db_pw, $db_name) or die (mysqli_errno($connection));
session_start();
if (isset($_SESSION['uid'])){$uid = $_SESSION['uid'];}
// else {$uid=2203102;}
if (isset($_SESSION['fullName'])){$fullName = $_SESSION['fullName'];}?>