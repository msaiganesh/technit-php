<?php
//$servername = $_SERVER['HTTP_HOST'];
$servername="localhost";
$username = "cyberadmin16";
$pasword = "huntCyber$%^";
//$username = "root";
//$pasword = "";

$db = "cyberhunt16";

// Create connection
$conn = mysqli_connect($servername, $username, $pasword,$db);
if (!$conn) {
    $status = "error";
    $message = "Oops, There's been a technical error!";
    die("Sorry Unable to Connect to DataBase.");
}
?>