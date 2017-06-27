<?php

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
    <a target="_blank" href="https://www.facebook.com/nitj.cyberhunt" class="close3">Hints-Forum</a>



</div>
<body>
<form  action="redirect.php" method="POST" name="myform">

    <link href="https://fonts.googleapis.com/css?family=Amatica+SC:400,700" rel="stylesheet">';
    echo $r;
    include_once"../conf.php";
    $em=$_SESSION["EMAIL"];
    $random_num=rand(1,27);
    $s1="SELECT * FROM memes WHERE sno='".$random_num."'";
    $res=mysqli_query($conn,$s1);
    $ro=mysqli_fetch_array($res);
    $t="<table>";
    $t=$t."<tr><td><h4>HUHAHAHAHA..!!!!</h4></td></tr>";
    $t=$t.'<td><img src="'.$ro[1].'"></td>';
    $t=$t."</tr>";
    echo $t;
    $r='
    <section>
        <button class="button button1">Try Again??</button>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


    <script src="js/index.js"></script>


</form>
</body>
</html>';
echo $r;

?>



