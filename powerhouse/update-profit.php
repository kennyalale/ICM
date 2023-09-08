<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
if(isset($_POST['Submit']))
{
	$percentage=mysqli_real_escape_string($con, $_POST['percentage']);
	$date = date('Y-m-d');
	$deposit=$_POST['deposit'];
	$userid=$_POST['userid'];
	$transid= 'PRT'.'-'.rand(100, 999);
	$email=$_POST['email'];
	$profit=$_POST['profit'];
	$balance=$_POST['balance'];
			mysqli_query($con,"update users set 
		balance='$balance',percentage='$percentage' where email='$email'");
		
		mysqli_query($con,"INSERT INTO transaction(transdate, transid, email, deposit, profit, withdraw, balance, description) VALUES ('$date', '$transid', '$email', '$deposit', '$profit', '-', '$balance', 'client profit')");
		mysqli_query($con,"INSERT INTO user_trans(transdate, transid, email, deposit, status) VALUES ('$date', '$transid', '$email', '$deposit', 'CONFIRMED')");
$_SESSION['msg']="Client Profit Added  successfully";




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

    <title>Admin | Update Profile</title>
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
      <?php $ret=mysqli_query($con,"select * from users where id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['fullname'];?>'s Information</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">UserID </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="userid" value="<?php echo $row['userid'];?>" readonly >
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fname" value="<?php echo $row['fullname'];?>"  readonly>
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname'];?>"  readonly>
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly >
                              </div>
                          </div>
                               
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Deposit </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="deposit" value="<?php echo $row['deposit'];?>"  onKeyUp="sum()" readonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Profit </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="profit"  onKeyUp="sum()" id="txt2">
                              </div>
                          </div>
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Previous Balance </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="deposit" value="<?php echo $row['balance'];?>" onKeyUp="sum()" id="txt1" readonly>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">New Balance </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="balance"  onKeyUp="sum()" id="txt3" readonly>
                              </div>
                          </div>
                                                
 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Trading Percentage</label>
                              <div class="col-sm-10">                              <select class="form-control" name="percentage" >
								<option>0</option>                                
								<option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>18</option>
                                <option>20</option>
                                <option>22</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>30</option>
                                <option>32</option>
                                <option>34</option>
                                <option>36</option>
                                <option>38</option>
                                <option>39</option>
                                <option>40</option>
                                <option>41</option>
                                <option>42</option>
                                <option>44</option>
                                <option>46</option>
                                <option>48</option>
                                <option>49</option>
                                <option>50</option>
                                <option>52</option>
                                <option>54</option>
                                <option>56</option>
                                <option>58</option>
                                <option>59</option>
                                <option>60</option>
                                <option>62</option>
                                <option>64</option>
                                <option>66</option>
                                <option>68</option>
                                <option>69</option>
                                <option>70</option>
                                <option>71</option>
                                <option>72</option>
                                <option>74</option>
                                <option>76</option>
                                <option>78</option>
                                <option>79</option>
                                <option>80</option>
                                <option>82</option>
                                <option>84</option>
                                <option>86</option>
                                <option>88</option>
                                <option>89</option>
                                <option>90</option>
                                <option>92</option>
                                <option>94</option>
                                <option>96</option>
                                <option>98</option>
                                <option>99</option>
                                <option>100</option>
                              
                         

 </select>
                              </div>
                          </div>                          
                          
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
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
