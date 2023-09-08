<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$msg1='';
$msg2='';

if(isset($_GET['id'])){

require('connect.php');
$acctid=$_GET['id'];
$acctemail=$_GET['email'];
$msg=mysql_query("delete from users where id='$acctid' and email='$acctemail'");
if($msg)
{



echo "<script>alert('Account deleted');</script>";
echo '<script>location.replace("manage-users.php");</script>';
}else{
echo "<script>alert('Unable to delete account, try again.');</script>";
echo '<script>location.replace("manage-users.php");</script>';	
}
}

/////////////////
 $userquery=mysqli_query($con,"SELECT * FROM support WHERE id='".$_GET['uid']."'") or die (mysqli_error());
$countuser=mysqli_num_rows($userquery);
if ($countuser==1)
{
	$row=mysqli_fetch_array($userquery);
	$mailler=$row['email'];
	$ticketid=$row['ticketid'];
	$subject=$row['subject'];
	$priority=$row['priority'];
	$date=$row['date'];
	$status=$row['status'];
}
/////////////////////////////////
if(isset($_POST['Submit']))
{

$date = date('Y-m-d');
	
$up=mysqli_query($con,"update support set status='ANSWERED' where id='".$_GET['uid']."'");
	if($up){
	$msg1='<font color="#009900">SUPPORT ANSWERED</font>';	
	}else{
		$msg1='<font color="#990000">OPERATION FAIL</font>';
	}
}
		
		
		
		
if(isset($_POST['Submit1']))
{

$date = date('Y-m-d');
	$msg=$_POST['msg'];
	
		$up=mysqli_query($con,"update support set status='ANSWERED' where id='".$_GET['uid']."'");
	if($up){
		//$mailler=$row['email'];
	//$ticketid=$row['ticketid'];
	$subject2='REPLY TO: '.$subject;
	//$priority=$row['priority'];
	$date=$row['date'];
	$status=$row['status'];
		$mmm=mysqli_query($con,"INSERT INTO support(subject, msg,priority,email,ticketid,date,status,admin) VALUES ('$subject2','$msg','$priority','$mailler','$ticketid','$date','ANSWERED','admin')");
		
	if($mmm){	
	$msg1='<font color="#009900">SUPPORT REPLY SENT</font>';	
	}else{
		$msg1='<font color="#990000">OPERATION FAIL</font>';
	}
		
}else{
		$msg1='<font color="#990000">OPERATION FAIL, try again</font>';
	}	
		
//$_SESSION['msg']="Profile Updated successfully";




}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Read Support Ticket</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Deposit Client Account</span>
                      </a>
                   
                  </li>
                           <li class="sub-menu">
                      <a href="manage-profit.php" >
                          <i class="fa fa-users"></i>
                          <span>Add Profit </span>
                      </a>
                   
                  </li>
                  
                  <li class="sub-menu">
                      <a href="manage-withdraw.php" >
                          <i class="fa fa-users"></i>
                          <span>View Withdrawal</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="manage-transaction.php" >
                          <i class="fa fa-users"></i>
                          <span>View Transaction </span>
                      </a>
                   
                  </li>
<li class="sub-menu">
                      <a href="support.php">
                          <i class="fa fa-file"></i>
                          <span>Support Request <b><font color="#FF9900" size="+1"> <?php $ret=mysqli_query($con,"select * from support WHERE status='NEW'");
							  $cntt=0;
 while($row=mysqli_fetch_array($ret)){
							$cntt=$cntt + 1;
								  
							  }
							  
							  echo $cntt;?>
                              </font></b></span>
                      </a>
                  </li>

          <li class="sub-menu">
                      <a href="manage-upgrade.php" >
                          <i class="fa fa-users"></i>
                          <span>Upgrade Client Account </span>
                      </a>
                   
                  </li>


  <li class="sub-menu">
                      <a href="compose-news.php" >
                          <i class="fa fa-users"></i>
                          <span>Compose News </span>
                      </a>
                   
                  </li>
          
                  <li class="sub-menu">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <?php 
	  $userquery=mysqli_query($con,"SELECT * FROM support WHERE id='".$_GET['uid']."'") or die (mysqli_error());
$countuser=mysqli_num_rows($userquery);
if ($countuser==1)
{
	$row=mysqli_fetch_array($userquery);
	$mailler=$row['email'];
	$ticketid=$row['ticketid'];
}
	
	$ret=mysqli_query($con,"select * from support where email='$mailler'");
	 // while($row=mysqli_fetch_array($ret))
	  
	 // {
		 $countuser=mysqli_num_rows($ret);
if ($countuser==1)
{
	$row=mysqli_fetch_array($ret);
	$mailler=$row['email'];
}?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Support Ticket: <?php
			echo $ticketid;
			
			?> &nbsp;<?php
			
			require('connect.php');
								  $j=$row['email'];




$userquery22=mysql_query("SELECT * FROM users WHERE email='$j'") or die (mysql_error());

$countuser22=mysql_num_rows($userquery22);
if ($countuser22==1)
{
	$row22=mysql_fetch_array($userquery22);

echo $row22['firstname'].'&nbsp;&nbsp;&nbsp;'.$row22['lastname'];
}

echo '&nbsp;&nbsp;<b>'.$msg1.'</b>';
 ?>

 </h3>
 
 

  	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php //echo $_SESSION['msg'];?><?php //echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Subject </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="subject" value="<?php echo $row['subject'];?>"  readonly>
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Priority</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="priority" value="<?php echo $row['priority'];?>"  readonly>
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">From</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Support Request </label>
                              <div class="col-sm-10">
              <?php echo $row['msg'];?>
                              </div>
                          </div>
                          
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> </label>
                              <div class="col-sm-10">
    <b><font color="#009900" size="+1"> <?php echo $row['date'].'</font>&nbsp;&nbsp;<font color="black" size="+1">Ticket ID:'.$row['ticketid'];?></font></b>
                              </div>
                          </div>
                          
                          
                          
                           <div style="margin-left:100px;">
            <?php if($row['status']=='NEW'){
				echo '<b><font color="#CC0000">Un_Answered</font></b>';
			}else{
				echo '<b><font color="green">Answered</font></b>';
			}?><input type="submit" name="Submit" value="Mark as Answered Support Ticket" class="btn btn-theme"></div>
                          </form>
                      </div>
                      
                      
                      
                      <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                      
                       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"></label>
                              <div class="col-sm-10">
                                  <br><br><font size="+2" color="#009900">REPLY SUPPORT MESSAGE</font>
                              </div>
                          </div>
                          
                          
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Support Mesage</label>
                              <div class="col-sm-10">
                                <textarea name="msg" class="form-control" rows="5"></textarea>
                          </div>
                          </div>
                          
                         
                           
                          
                          <div style="margin-left:100px;">
    <input type="submit" name="Submit1" value="Send" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php //} ?>
      </section></section>
      
      <script>
  function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 		
        }
</script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
