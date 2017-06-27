<?php
$email = mysql_escape_string($_POST['email']);
$pass = mysql_escape_string($_POST['pass']);
$hash = md5($pass);
include_once"conf.php";


			$query="SELECT password FROM `cyberhunt16`.`user` WHERE email='".$email."'";
	
	$storedHash=mysqli_query($conn,$query);
	if(mysqli_num_rows($storedHash) < 1)
	   {
		   header("location:login.html");
	   }else
		   {
	$arr=mysqli_fetch_array($storedHash);
	$realHash=$arr['password'];
	if($realHash==$hash)
	{
		session_start();
		$_SESSION["EMAIL"]=$email;
		//echo "login Succesful !";
		header("location:QuestionPage/index_ques.php");

	}else
	{
		//echo "Password is incorrect";
		header("location:login.html");

	}
	}
?>