<?php

	//1. Get the POST variables. name, emailid, password1, password2 and college name.
    	//2. Sanitize data
    include_once"conf.php";
	$name = ($_POST['username']);
	$email = ($_POST['email']);
	$password1 = ($_POST['password']);
	$password2 = ($_POST['cpassword']);
$passm=$password1;
	$college = ($_POST['college']);
	$number = ($_POST['number']);
	$insertSignup;
	
    //validate email address - check if input was empty

if(empty($email) || empty($name) || empty($password1) || empty($password2) || $password1!=$password2 || empty($college) || !preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email))
    	{
        
 header("location:signup.html");
    	}
	
    	else 
	{

		$query = "SELECT * FROM user WHERE email='$email'";
		
       		$existingSignup = mysqli_query($conn,$query);   
       	  if(mysqli_num_rows($existingSignup) < 1)
	   {
		   date_default_timezone_set("Asia/Kolkata");
           	$date = date('Y-m-d');
           	$time = date('H:i:s');
			$password1=md5($password1);

		   $lastc=strtotime('+ 1 week');
		   //$registeration_exp=DATE_ADD(NOW(),INTERVAL 7 DAY);
		   $query = "INSERT INTO  `cyberhunt16`.`user` (`username` ,`email` ,`password` ,`college` ,`contact`,`reg_date`,`reg_time`,`ques_sub`) VALUES ('$name',  '$email',  '$password1',  '$college',  '$number','$date','$time','1');";
           	$insertSignup = mysqli_query($conn,$query);
			
           	if($insertSignup)
			{
				header("location:confirm/index.html");
               		//$status = "success";
               		//$message = "Congrats! You have booked your ticket for the hunt!";
           	}
           	else 
			{
               		$status = "error";
               		$message = "Oops, There's been a technical error!";
           	}
		   
       	  }
        else 
	{
           header("location:signup.html");
                   }
}
 
    //return json response 
    $data = array(
        'status' => $status,
        'message' => $message
    );
 
    echo json_encode($data);
    exit;
?>