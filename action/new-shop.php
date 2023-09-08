<?php
session_start();
require('connect.php');
ob_start();
date_default_timezone_set('Africa/Dar_es_salaam');
include 'db_config.php';
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['firstname']));
$usern = ucwords(mysqli_real_escape_string($conn, $_POST['username']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lastname']));
//$secq = ucwords(mysqli_real_escape_string($conn, $_POST['secq']));
//$seca = ucwords(mysqli_real_escape_string($conn, $_POST['seca']));
$pass = ucwords(mysqli_real_escape_string($conn, $_POST['password']));
//$con_pass = ucwords(mysqli_real_escape_string($conn, $_POST['repeat_password']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
#$currency = mysqli_real_escape_string($conn, $_POST['currency']);
$country = ucwords(mysqli_real_escape_string($conn, $_POST['country']));
$phone = mysqli_real_escape_string($conn, $_POST['fone']);
//$age = mysqli_real_escape_string($conn, $_POST['age']);

$transid = rand(1111,9999);

//check mail


$userquery=mysql_query("SELECT * FROM users WHERE email='$email'") or die (mysql_error());


$countuser=mysql_num_rows($userquery);
//if ($conn->query($countuser) == TRUE) {
if ($countuser){
	//$row=mysql_fetch_array($userquery);
	//$_SESSION['myusername']=$row['uname'];
//$_SESSION['sign_msg'] = "[".$email."] Email as been used";
$_SESSION['sign_msg'] = "A user with this email address already exist <font color='#CC9900'>".$email."</font>";
	echo '<script>location.replace("../portal/users/form/signup.php
"); </script>';
	
  
}else{
	
	
	
$sql = "INSERT INTO users(transid, username, fullname, lastname, password, email, country, phone,deposit) VALUES ('$transid','$usern','$fname','$lname','$pass','$email','$country','$phone','0.00')";


if ($conn->query($sql) == TRUE) {
     header("location:../account/confirm.html");
 if(isset($_POST['email'])){
$fname = $_POST['firstname'];
$email = $_POST['email'];

		date_default_timezone_set('UTC');
$date = date("l, F  j Y");
$time = date('h:i:s a', time());
$nowww = $date." ".$time;

	$to = 'support@worldOptionTradersprofit.com';
	//$to = $_SESSION["qv"];
$subject = "Fxcryptoconnect
";
//$from = $email;


//$host = "smtp.unitedfunds24.com";
$host = "mx1.hostinger.com";
$port = '587';
$username = "u426702188";
$password = "powerbikeclerk";


//$to = 'support@24hourloan.co.za'; // note the comma

// Subject
//$subject = 'Client Application';

// Message
$message = "WORLDOptionTradersPROFIT";
$message="Good Day! <b> ".$fname."&nbsp;".$lname."  </b> <br> 
You have successfully registered an account with WORLDOptionTradersPROFIT . <br>

<p>We render a 24hours risk free trading section. Our OptionTraders experts are always available and ready to assist you in your trading for best results. Your payout after each trading section is 100% guaranteed. Make a choice from our available packages to start trading. </p>
<p> Thank you! </p> 

 <p>The WORLDOptionTradersPROFIT team wishes you successful trading!</p>
<br> 
© Copyright WorldOptionTradersProfit All Rights Reserved.
";



// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] ='From:'.$email;
$headers[] = 'Cc: '.$to;

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
if(mail){
echo 'Your Registration is Been Process, We will Get Back to You  As Soon as Possible Via Email (support@worldOptionTradersprofit.com)';
}
else{
	echo 'Unable to resend code, try again';
}
}
  
    
     

    
}  if(mysqli_num_rows($sql)>0){
			$_SESSION['sign_msg'] = "Email already taken";
  			header('location:../portal/users/form/signup.php
');
		}
		
		




 


else{
	echo 'Unable to resend code, try again';
}
}






$conn->close();
?>
