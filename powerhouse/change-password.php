<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
if(isset($_POST['Submit']))
{
$oldpassword=$_POST['oldpass'];
$bitcoin=$_POST['bitcoin'];
$sql=mysqli_query($con,"SELECT password FROM admin where password='$oldpassword' and bitcoin='$bitcoin'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$adminid=$_SESSION['id'];
$bitcoin=$_POST['bitcoin'];
$newpass=$_POST['newpass'];
 $ret=mysqli_query($con,"update admin set password='$newpass',bitcoin='$bitcoin' where id='$adminid'");
$_SESSION['msg']="Password Changed Successfully !!";


//header('location:user.php');
}
else
{
$_SESSION['msg']="Old Password or Bitcoin Address not match !!";
}
}
?>
<script language="javascript" type="text/javascript">
function valid()
{
if(document.form1.oldpass.value=="")
{
alert(" Old Password Field Empty !!");
document.form1.oldpass.focus();
return false;
}
else if(document.form1.bitcoin.value=="")
{
alert("Bitcoin Address Field Empty !!");
document.form1.bitcoin.focus();
return false;
}
else if(document.form1.newpass.value=="")
{
alert(" New Password Field Empty !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value=="")
{
alert(" Re-Type Password Field Empty !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.bitcoin.value.length<34)
{
alert("Bitcoin Address must be atleast of 34 characters !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.newpass.value.length<6)
{
alert(" Password Field length must be atleast of 6 characters !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value.length<6)
{
alert(" Re-Type Password Field less than 6 characters !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value!= document.form1.confirmpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.form1.newpass.focus();
return false;
}
return true;
}
</script><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Change Password</title>
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
                      <a href="manage_upgrade_popup.php" >
                          <i class="fa fa-users"></i>
                          <span>Upgrade Popup</span>
                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="manage-lock.php" >
                          <i class="fa fa-users"></i>
                          <span>Lock Withdrawal</span>
                      </a>
                   
                  </li>
          			<li class="sub-menu">
                      <a href="manage_investment.php" >
                          <i class="fa fa-users"></i>
                          <span>View Investors</span>
                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="manage_recentwithdraw.php" >
                          <i class="fa fa-users"></i>
                          <span>View Recent Withdraw</span>
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
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Change Password </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                            <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Bitcoin Address</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="bitcoin" value="" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Old Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="oldpass" value="" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">New Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="newpass" value="" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Confirm Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="confirmpassword" value="" >
                              </div>
                          </div>
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Change" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
      </section></section>
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
