<?php
$email = mysql_escape_string($_POST['email']);
$opass = mysql_escape_string($_POST['opass']);

$pass = mysql_escape_string($_POST['pass']);
$cpass = mysql_escape_string($_POST['cpass']);

require"conf.php";
	$query="SELECT password FROM `cyberhunt16`.`user` WHERE email='".$email."'";

	$storedHash=mysqli_query($conn,$query);
	if(mysqli_num_rows($storedHash) < 1)
    { 
header("location:reset.php");
}else
    {
        $arr=mysqli_fetch_array($storedHash);
        $realHash=$arr['password'];
        $opass=md5($opass);
        if($realHash==$opass)
        {
            if($pass==$cpass) {
                $pass=md5($pass);
                $ss = "UPDATE `cyberhunt16`.`user` SET `password`='".$pass."' WHERE `email`='".$email."'";
                $res=mysqli_query($conn,$ss);
                header("location:login.html");

            }

        }else
        {
            header("location:reset.php?msg=1");

        }
    }
?>



