<?php
	include('conn.php');
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function check_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	$email=check_input($_POST['email']);
	

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$_SESSION['sign_msg'] = "Invalid email format";
  		header('location:../forget_password.php');
	}

	else{

		$query=mysqli_query($conn,"select * from user where email='$email'");
		if(mysqli_num_rows($query)>0){
			$_SESSION['sign_msg'] = "Email already taken";
  			header('location:../forget_password.php');
		}
		else{
		//depends on how you set your verification code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);

		
		//default value for our verify is 0, means it is unverified

		//sending email verification
		$to = $email;
			$subject = "Sign Up Verification Code";
			$message = "
				<html>
				<title>Global Constant Income</title>
				</head>
				<body>
				<h2>RESET PASSWORD</h2>
																<p>Hello, request has been made to reset your password. To reset your password, please click on this link:</p>
				<p><h4><a href='https://www.DcgOptionTrade/change_password.php?uid=".$uid."&code=".$code."'>
				
				https://www.DcgOptionTrade/change_password.php?uid=".$uid."&code=".$code."
				
				</a></h4></p>
				<p>If you did not make this request, you do not need to take any action. Your password cannot be changed without clicking the above link to verify the request. </p>
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: noreply@DcgOptionTrade". "\r\n" .
						"CC: .$email.";

		mail($to,$subject,$message,$headers);

		$_SESSION['sign_msg'] = "A link to reset your password has been sent to your email address. Follow this link to reset your password.";
  		header('location:../forget_password.php');

  		}
	}
	}
?>