<?php
//$ball=0;
require('../connect.php');
session_start();
if(isset($_GET['out'])){
	//if($_GET['out']=="out"){
		echo '<script>location.replace("../login.php"); </script>';	
	//}
}
if (isset($_SESSION['xmail'])) {
	$email=$_SESSION['xmail'];
}else{
	echo '<script>location.replace("../login.php"); </script>';	
       
        
}
//CHANGE PROFILE PICTURE
$msg="";
if(isset($_POST['p1'])){
	$target_dir = "";
$target_file = $target_dir . basename($_FILES["uploaded"]["name"]);

    if (move_uploaded_file($_FILES["uploaded"]["tmp_name"], $target_file)) {
       $sqlquery= mysql_query("UPDATE accountreg set pic='$target_file'WHERE email='$email'") or die (mysql_error());

if ($sqlquery)
{
$msg='<img src="1.ico" width="40" height="40"> Upload Successful';
		
	}else{
	$msg='<img src="3.ico" width="40" height="40"> Unable to upload picture,try again';
		
	}
	}else{
	$msg='<img src="3.ico" width="40" height="40"> Unable to update your account, try again';
		
	}
}

   
   $userquery=mysql_query("SELECT * FROM accountreg WHERE email='$email'") or die (mysql_error());
$countuser=mysql_num_rows($userquery);
if ($countuser==1)
{
	$row=mysql_fetch_array($userquery);
	$username=$row['username'];
	$status=$row['status'];
	$phonenumber=$row['phonenumber'];
	 $firstname=$row['fullname'];
	 $middlename=$row['middlename'];
	  $country=$row['country'];
	  $pic=$row['pic'];
}

?>


<!DOCTYPE html>
<!-- saved from url=(0046)dashboard.php -->
<html lang="en" style="height: auto; min-height: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="description" content="UniqueFxOptionsis world&#39;s leading cryptocurrency online investment and trading platform that offers Bitcoin trading options, provides 24/7 customer support, high level of security, and stable deposits and withdrawals.">
  	<meta name="keywords" content="UniqueFxOptions, Bitcoin Investment, Bitcoin Trading Platform, Binary Trading Platform, Digital Options Trading, BTC">
  	<meta name="author" content="UniqueFxOptions">
    <title>Royal Life GLobal Foundation | <?php echo $email; ?></title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="./Trade Center _ UniqueFxOptions_files/bootstrap.css">
    
	<!--amcharts -->
	<link href="./Trade Center _ UniqueFxOptions_files/export.css" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap-extend -->
	<link rel="stylesheet" href="./Trade Center _ UniqueFxOptions_files/bootstrap-extend.css">

	<!-- theme style -->
	<link rel="stylesheet" href="./Trade Center _ UniqueFxOptions_files/master_style.css">

	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="./Trade Center _ UniqueFxOptions_files/_all-skins.css">
	<link href="./Trade Center _ UniqueFxOptions_files/bootstrap-datetimepicker.min.css" rel="stylesheet">
  	<link href="./Trade Center _ UniqueFxOptions_files/bootstrap-datepicker.min.css" rel="stylesheet">
     
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->     
<script type="text/javascript" src="./Trade Center _ UniqueFxOptions_files/fabric.min.js.download" async></script><script type="text/javascript" src="./Trade Center _ UniqueFxOptions_files/FileSaver.min.js.download" async></script><!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cced3d32846b90c57acf0ff/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script--></head>

<body class="skin-blue   sidebar-mini" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="../jjj.png" width="100" height="50">Royal Life</b> Empowerment</span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      
    </a>                           
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="dashboard.php" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $pic; ?>" width="100" height="100" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12">
                    <a href="profile.php"><i class="ion ion-person"></i> My Profile</a>
                  </div>
				          <div class="col-12">
                    <a href="dashboard.php?out=out"><i class="icon-logout"></i> Logout</a>
                  </div>
                  
                   <div class="col-12">
                    <a><i class="icon-logout"></i>  <?php
		  echo $email;
		  ?></a>
                  </div>
                 
          				
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
    		<div class="ulogo">
    			 <a href="dashboard.php">
    			  <!-- logo for regular state and mobile devices -->
    			  <span><b>Royal Life</b> Emp</span>
                
    			</a>
    		</div>
        <div class="image">
          <img src="<?php echo $pic; ?>" width="100" height="100" class="rounded-circle" alt="User Image"><center>
          
          <div style="width:80%; color:#FFF;"><br><?php
		  echo $email;
		  ?>
          <br><?php
		  echo $username;
		  ?>
          </div>
          </center>
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu tree" data-widget="tree">
		<li class="nav-devider"></li>
        <li class="active">
          <a href="dashboard.php">
            <i class="fa fa-bar-chart"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="">
          <a href="profile.php">
            <i class="fa fa-user"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="">
          <a href="refferal.php">
            <i class="fa fa-money"></i> <span>Refferal Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
       
       
        <li>
          <a href="dashboard.php?out=out">
            <i class="fa fa-arrow-left"></i> <span>Logout</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <br><center>
        <img src="../jjj.png" width="100" height="50">
        </center>
      </ul>
    </section>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 498px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-sm-12">
                </div>
    </div>  
		
      <div class="row">
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('./profile_files/22.png';) center center;">
              <h3 class="widget-user-username"> <img class="rounded-circle" src="<?php echo $pic; ?>" width="100" height="100" alt="User Avatar"><?php echo $firstname; echo '&nbsp;&nbsp;'.$middlename;   ?></h3>
           
            <form action="" method="post" enctype="multipart/form-data">Change profile picture
<input type="file" name="uploaded">
<input type="submit" value="Save" name="p1" style="background:#0C6; color:#FFF;">
            </form> </div>
           <!-- <div class="widget-user-image">
              <img class="rounded-circle" src="<?php echo $pic; ?>" width="100" height="100" alt="User Avatar">
            </div>-->

          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
          <div class="col-lg-6">
            <div class="box box-solid bg-dark">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-user"></i> User Info</h3>

                  <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="list-group list-group-flush">
                      <p class="list-group-item"><i class="fa fa-user"></i> First Name: &nbsp;&nbsp; <strong><?php echo $firstname;   ?></strong> </p>
                      <p class="list-group-item"><i class="fa fa-user"></i> Middle Name: &nbsp;&nbsp; <strong><?php echo $middlename;    ?></strong> 
                      </p><p class="list-group-item"> <i class="fa fa-envelope"></i> Email: &nbsp;&nbsp; <strong><?php  echo $email; ?></strong> </p>
                      <p class="list-group-item"><i class="fa fa-phone"></i> Phone: &nbsp;&nbsp; <strong><?php  echo $phonenumber;  ?></strong> </p>
                      <p class="list-group-item"><i class="fa fa-home"></i> Country of Residence: &nbsp;&nbsp; <strong><?php  echo $country;  ?></strong> </p>
                    </div>
                </div>
                <!-- /.box-body -->
     
            </div>
            <!-- /.box -->
         </div>
         <!-- Col -->

         <div class="col-lg-6">
            <div class="box box-solid bg-dark">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="icon-wallet"></i> Account Info</h3>

              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <div class="list-group list-group-flush">
                    <p class="list-group-item"><i class="fa fa-money"></i> Available Balance: &nbsp;&nbsp; <strong>  <?php
				  require('../connect.php');
				    $userquery=mysql_query("SELECT * FROM accountbal WHERE email='$email'") or die (mysql_error());
$countuser=mysql_num_rows($userquery);
if ($countuser==1)
{
	$row=mysql_fetch_array($userquery);
	
	echo $ball='$ '.$row['ball'];
}
				  ?></strong></p>
                    <p class="list-group-item"><i class="fa fa-cogs"></i> Account Status: &nbsp;&nbsp; <strong><?php 
						if($status=="verify"){
							echo '<font color="#990000" size="+1"><b><img src="2.ico" width="20" height="20">Not Verified</b></font>';
							echo '<br>Please verify your account via the mai sent to your Email';
						}elseif($status=="verified"){
						echo '<font color="#009933" size="+2"><b><img src="1.ico" width="20" height="20">Active</b>';
						
						}?></strong> </p>
                    <!--<p class="list-group-item"><i class="fa fa-dashboard"></i> Account Type: &nbsp;&nbsp; <strong>Live Trading Account</strong> </p>-->
                    <p class="list-group-item"><i class="fa fa-bar-chart"></i> Account Level: &nbsp;&nbsp; <strong>
                     <?php
				  require('../connect.php');
				    $userquery=mysql_query("SELECT * FROM accountlevel WHERE email='$email'") or die (mysql_error());
$countuser=mysql_num_rows($userquery);
if ($countuser==1)
{
	$row=mysql_fetch_array($userquery);
	
	$level=$row['level'];
}
				  ?><?php 
				  
				  if($ball>0){
					echo 'level '.$level;  
				  }else{
					echo '&nbsp;NONE';  
				  }
				   ?></strong> </p>
                  </div>
            </div>
            <!-- /.box-body -->
     
           </div>
            <!-- /.box -->
         </div>
         <!-- Col -->
       </div>
       <!-- Row -->

	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
	  © 2019 <a href="#">Royal Life Empowerment</a>. All Rights Reserved.
  </footer>
  
</div>
<!-- ./wrapper -->
	  
	<!-- jQuery 3 -->
	<script async src="./profile_files/default" charset="UTF-8" crossorigin="*"></script><script src="./profile_files/jquery.js.download"></script>
	
	<!-- popper -->
	<script src="./profile_files/popper.min.js.download"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="./profile_files/bootstrap.js.download"></script>
	
	<!-- Slimscroll -->
	<script src="./profile_files/jquery.slimscroll.js.download"></script>
	
	<!-- FastClick -->
	<script src="./profile_files/fastclick.js.download"></script>
	
    <!--amcharts charts -->
	<script src="./profile_files/amcharts.js.download" type="text/javascript"></script>
	<script src="./profile_files/gauge.js.download" type="text/javascript"></script>
	<script src="./profile_files/serial.js.download" type="text/javascript"></script>
	<script src="./profile_files/amstock.js.download" type="text/javascript"></script>
	<script src="./profile_files/pie.js.download" type="text/javascript"></script>
	<script src="./profile_files/animate.min.js.download" type="text/javascript"></script>
	<script src="./profile_files/export.min.js.download" type="text/javascript"></script>
	<script src="./profile_files/patterns.js.download" type="text/javascript"></script>
	<script src="./profile_files/light.js.download" type="text/javascript"></script>	
	
	<!-- webticker -->
	<script src="./profile_files/jquery.webticker.min.js.download"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="./profile_files/echarts-en.min.js.download"></script>
	<script src="./profile_files/echarts-liquidfill.min.js.download"></script>
	
	<!-- This is data table -->
    <script src="./profile_files/jquery.dataTables.min.js.download"></script>
	
	<!-- Crypto_Admin App -->
	<script src="./profile_files/template.js.download"></script>
	
	
	<!-- Crypto_Admin for demo purposes -->
	<script src="./profile_files/demo.js.download"></script>

	<!-- This is data table -->
    <script src="./profile_files/jquery.dataTables.min.js.download"></script>
    
    <!-- start - This is for export functionality only -->
    <script src="./profile_files/dataTables.buttons.min.js.download"></script>
    <script src="./profile_files/buttons.flash.min.js.download"></script>
    <script src="./profile_files/jszip.min.js.download"></script>
    <script src="./profile_files/pdfmake.min.js.download"></script>
    <script src="./profile_files/vfs_fonts.js.download"></script>
    <script src="./profile_files/buttons.php5.min.js.download"></script>
    <script src="./profile_files/buttons.print.min.js.download"></script>
    <!-- end - This is for export functionality only -->
	

	
	
</body></html>