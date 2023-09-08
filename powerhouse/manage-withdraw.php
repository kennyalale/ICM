<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
if(isset($_GET['transid']))
{
$adminid=$_GET['transid'];
$msg=mysqli_query($con,"delete from withdrawal where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
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
          	<h3><i class="fa fa-angle-right"></i> Manage Withdrawal</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel" >
                      <div style="overflow-x:auto">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Withdraw Requests </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                               <th>Actions</th>
                                  <th>Sno.</th>
                                  <th>TransID</th>
                                  <td>Email</td>
                                  <th class="hidden-phone">Withdrawal Method</th>
                                  <th> Account No</th>
                                  <th> Account Name</th>
                                  <th>Swift Code</th>
                                  <th>Bank</th>
                                  <th>WalletID</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from withdrawal");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                               <td>
                                     
                                     <a href="update-withdrawal.php?uid=<?php echo $row['transid'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil "></i></button></a>
                                     <a href="manage-withdraw.php?transid=<?php echo $row['transid'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              	  <td><?php echo $cnt;?></td>
                              	  <td><?php echo $row['transid'];?></td>
                              	  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['withmethod'];?></td>
                                  <td><?php echo $row['accountno'];?></td>
                                  <td><?php echo $row['accountname'];?></td>
                                  <td><?php echo $row['swiftcode'];?></td>
                                  <td><?php echo $row['bank'];?></td>
                                  <td><?php echo $row['walletadd'];?></td>
                                  <td><?php echo $row['amount'];?></td>
                                  <td><?php echo $row['status'];?></td>
                                
                                 
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                          </div>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
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
