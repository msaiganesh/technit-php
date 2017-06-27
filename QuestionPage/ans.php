<?php
session_start();
if(!isset($_SESSION['EMAIL']))
    header("Location:../login.html");
$em=$_SESSION["EMAIL"];
include"../conf.php";
$s1="SELECT `ques_sub` FROM `user` WHERE email='".$em."'";
$res=mysqli_query($conn,$s1);
// echo $res;
$ro=mysqli_fetch_array($res);
//echo $ro[0];
//echo "Heloo";
$s="SELECT `q_id`,`q_path`, `q_ans` FROM `question` WHERE q_id='".$ro[0]."'";

$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);
$ans=$row[2];
$given_ans=$_REQUEST['answer'];
$given_ans=strtolower(str_replace(' ','',$given_ans));
//echo $given_ans;
//echo " Answer id".$ans;
if($given_ans==$ans)
{
    date_default_timezone_set("Asia/Kolkata");
    $time_now=date('Y-m-d H:i:s');
   $s2="UPDATE `user` SET `ques_sub`=ques_sub+1,`lastcorrect`='".$time_now."' WHERE email='".$em."'";
    $ress=mysqli_query($conn,$s2);
    header("location:index_ques.php");
}
else
{
    header("location:meme.php");

}
