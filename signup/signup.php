<?php
	include_once"conf.php";
	//1. Get the POST variables. name, emailid, password1, password2 and college name.
    	//2. Sanitize data
    
	$name = ($_POST['username']);
	$email = ($_POST['email']);
	$password1 = ($_POST['password']);
	$password2 = ($_POST['cpassword']);
	$college = ($_POST['college']);
	$number = ($_POST['number']);
	$insertSignup;
	
    //validate email address - check if input was empty

		$query = "SELECT * FROM user WHERE email='$email'";
		
       		$existingSignup = mysqli_query($conn,$query);   
       	  if(mysqli_num_rows($existingSignup) < 1)
	   {

           	$date = date('Y-m-d');
           	$time = date('H:i:s');
			$password1=md5($password1);
		   $query = "INSERT INTO  `cyberhunt16`.`user` (`username` ,`email` ,`password` ,`college` ,`contact`,`reg_date`,`reg_time`) VALUES ('$name',  '$email',  '$password1',  '$college',  'number','$date','$time');";
           	$insertSignup = mysqli_query($conn,$query);
			
           	if($insertSignup)
			{
               		$status = "success";
               		$message = "Congrats! You have booked your ticket for the hunt!";   
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

 
    //return json response 
    $data = array(
        'status' => $status,
        'message' => $message
    );
 
    echo json_encode($data);
    exit;
?>