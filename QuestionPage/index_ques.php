<?php
   // include("header_ques/index.html");
      session_start();
if(!isset($_SESSION['EMAIL']))
    header("Location:../login.html");
    $r='<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>CyberHunt</title>

    <style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button1 {
      background-color: white;
      color: black;
      border: 2px solid #008CBA;
    }

    .button1:hover {
      background-color: #008CBA;
      color: white;
    }

    .button2 {

    }

    .button2:hover {

    }

    .button3 {
        background-color: white;
        color: black;
        border: 2px solid #f44336;
    }

    .button3:hover {
        background-color: #f44336;
        color: white;
    }

    .button4 {
        background-color: white;
        color: black;
        border: 2px solid #e7e7e7;
    }

    .button4:hover {background-color: #e7e7e7;}

    .button5 {
        background-color: white;
        color: black;
        border: 2px solid #555555;
    }

    .button5:hover {
        background-color: #555555;
        color: white;
    }
    </style>


        <link rel="stylesheet" href="css/style.css">





  </head>
  <div id="header">

      <a href="../logout.php" class="close">Logout</a>
      <a target="_blank" href="../leader/leader.php?pg=0" class="close1">LeaderBoard</a>
      <a  target="_blank" href="rules.html" class="close2">Rules</a>
      <a target="_blank" href="https://www.facebook.com/nitj.cyberhunt" class="close3">Forum</a>



  </div>
  <body>

  <form  action="ans.php" method="POST" name="myform">

    <link href="https://fonts.googleapis.com/css?family=Amatica+SC:400,700" rel="stylesheet">';
    echo $r;
    include_once"../conf.php";
    $em=$_SESSION["EMAIL"];

   $s1="SELECT `ques_sub` FROM `user` WHERE email='".$em."'";
    $res=mysqli_query($conn,$s1);
   // echo $res;
    $ro=mysqli_fetch_array($res);
    //echo $ro[0];
    //echo "Heloo";
    $s="SELECT `q_id`,`q_path`, `q_ans` FROM `question` WHERE q_id='".$ro[0]."'";

    $result=mysqli_query($conn,$s);
    $t="<table>";
    $t=$t."<tr><td><h4>Question</h4></td></tr>";
    if($row=mysqli_fetch_array($result))
    {
        //echo $row[0];
        //echo $row[1];
        $t=$t."<tr>".$row[0]."</tr>";
        $t=$t."<tr>";
        $t=$t.'<td><img src="'.$row[1].'"></td>';
        $t=$t."</tr>";

    }
    else
    {
        echo "NO MORE QUESTION";
    }

    $t=$t."</table>";
    echo $t;
    $r='<section>
    <h2>Answer Me</h2>
    <ul class="input-list style-1 clearfix">
      <li>
        <input type="text" placeholder="Answer" name="answer">
      </li>

    </ul>
      <button class="button button1">Submit</button>
  </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


        <script src="js/index.js"></script>


</form>
  </body>
</html>';
echo $r;

  ?>