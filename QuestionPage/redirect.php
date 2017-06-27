<?php
session_start();
if(!isset($_SESSION['EMAIL']))
    header("Location:../login.html");
header("location:index_ques.php");
?>