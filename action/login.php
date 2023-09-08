<?php
session_start();
include 'db_config.php';
$mypassword = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE email = '$email' and password = '$mypassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    

    $row = $result->fetch_assoc();

setcookie(loggedin, date("F jS - g:i a"), $seconds);

  $_SESSION['loggedin'] = true;
      // $_SESSION['shop_id'] = $row['shop_id'];
  $_SESSION['fullname'] = $row['fullname'];	
	$_SESSION['lastname'] = $row['lastname'];
   $_SESSION['phone'] = $row['phone'];	
	$_SESSION['email'] = $row['email'];
	$_SESSION['country'] = $row['country'];
   //  $_SESSION['shop_no'] = $row['shop_no'];	
//	$_SESSION['shop_logo'] = $row['shop_logo'];
//$_SESSION['shoptimezone'] = $row['shop_timezone'];
		$_SESSION['deposit'] = $row['deposit'];
		$_SESSION['deposit1'] = $row['transid'];
				$_SESSION['deposit2'] = $row['percentage'];
		//	$_SESSION['accounttype'] = $row['sec_answer'];
					//	$_SESSION['link'] = $row['links'];
$_SESSION['deposit5'] = $row['accounttype'];
		$_SESSION['amt'] = $row['amt'];
		$_SESSION['text'] = $row['texts'];
		$_SESSION['photo'] = $row['photo'];
			$_SESSION['bitcoin'] = $row['bitcoin'];
	header("location:../dash/exchange.php");
		
	}
	
else if(mysqli_num_rows($query)==0){
				
  		echo "<br/><br/><br/><br/><br/><center>Not valid Email or password or Account is not Active. Please try again or contact to support.<br> © Copyright 2020 Ameroptiontrade. All Rights Reserved.</center>";
header( "refresh:10;url=../login.php
" );
	}
		$conn->close();
?>
