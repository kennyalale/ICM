<?php
error_reporting(0);
include 'action/check-login.php
';
include 'action/alerts.php';


include '../config/db_config.php';

$sql = "SELECT * FROM shops where shop_id = '$SEshop_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $shop_address = $row['shop_address'];
	$shop_street = $row['shop_street'];
	$shop_phone = $row['shop_phone'];
	$shop_timezone = $row['shop_timezone'];
    }
} else {
 
}
$conn->close();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- saved from url=(0035)http://crypto-miners.net/?a=deposit -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Hypicrypto-miners</title>

	<link href="./crypto-miners.net_files/global.css" rel="stylesheet" type="text/css">
	<link href="./crypto-miners.net_files/css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./crypto-miners.net_files/jquery-1.8.3.min.js.download"></script>
    <script type="text/javascript" src="./crypto-miners.net_files/active.js.download"></script>
</head>

<body class="cabinet">
<div id="acc_bodyWrapper">	


    <div id="acc_headerWrapper">
    	<div id="acc_header">
        
                
            <div class="logout"><a href="../index.html">Logout</a></div>
            
            <div class="name"><span>User:</span>  <?php echo"$SEshopname"; ?></div>
            
        </div>
    </div>
    
    
    <div id="acc_BannerWrapper">
    <div id="acc_BannerWrapperSecond">
        <div id="acc_Banner">
        
            <a href="http://crypto-miners.net/?a=home" class="logo"></a> 
            
            <div class="deposit-top">Give your money a chance to grow</div>

            

           
            <div id="nav" class="user-menu">
                <ul>
                    <li><a href="index.php"><div class="icon icon-1"></div>Your<br>Account</a></li>
                    
                    
                    <li><a href="deposit.php"><div class="icon icon-2"></div>Your<br>Deposits</a></li>
                    <li><a href="earning.php"><div class="icon icon-3"></div>Deposits<br>History</a></li>
                    <li><a href="earning.php"><div class="icon icon-4"></div>Earnings<br>History</a></li>
                    
                    <li><a href="withdrawal.php"><div class="icon icon-5"></div>Cashouts<br>History</a></li>
                                        <li><a href="referral.php"><div class="icon icon-6"></div>Your<br>Referrals</a></li>
                    
                                        <li><a href="edit.php"><div class="icon icon-7"></div>Edit<br>Account</a></li>
                    
                </ul>
            </div>

            <div id="nav" class="user-menu-2">            
                <ul>
                    <li><a href="withdrawal.php" class="cashout">Cashout</a></li>                 
                    <li><a href="makedeposit.php" class="deposit">Deposit</a></li>
                </ul>            
            </div>              
                    
        </div>
    </div>
    </div>



<div id="contentWrapper">
	<div id="content">
    



<script language="javascript"><!--
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");


  
  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }

  

}

function updateCompound() {
  var id = 0;
  var tt = document.spendform.h_id.type;
  if (tt && tt.toLowerCase() == 'hidden') {
    id = document.spendform.h_id.value;
  } else {
    for (i = 0; i < document.spendform.h_id.length; i++) {
      if (document.spendform.h_id[i].checked) {
        id = document.spendform.h_id[i].value;
      }
    }
  }

  var cpObj = document.getElementById('compound_percents');
  if (cpObj) {
    while (cpObj.options.length != 0) {
      cpObj.options[0] = null;
    }
  }

  if (cps[id] && cps[id].length > 0) {
    document.getElementById('coumpond_block').style.display = '';

    for (i in cps[id]) {
      cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
    }
  } else {
    document.getElementById('coumpond_block').style.display = 'none';
  }
}


var cps = {};
--></script>

<!---------
 <script type="text/javascript">
              $(document).ready(function(){
                 $('.dep-btn').click(function(){
                    $('.dep-btn').removeClass('selected');
                    $(this).addClass('selected');	 
                    id='#body'+$(this).attr("id").substr(2);
                    if ($(id).css("display")=="none") {
                      $('.dep-panel').slideUp('normal');
                      $(id).slideToggle('normal');
                    }
                    else $('.dep-panel').slideUp('normal');
                    return false;
                 });
              });
            </script>
			------>
            

<h3>Deposit Confirmation:</h3>
<br><br>

<table cellspacing="0" cellpadding="2" class="form deposit_confirm" align="center"> 
<tbody><tr>
 <th>Plan:</th>
 <td>13% After 24 hours</td>
 <td rowspan="6"></td>
</tr>
<tr>
 <th>Profit:</th>
 <td>15.00% after 1 days</td>
</tr>
<tr>
 <th>Principal Return:</th>
 <td>No (included in profit)</td>
</tr>
<tr>
 <th>Principal Withdraw:</th>
 <td>
Not available </td>
</tr>
 

<tr>
 <th>Credit Amount:</th>
 <td>$180.00</td>
</tr>
<tr>
 <th>Deposit Fee:</th>
 <td>0.00% + $0.00 (min. $0.00 max. $0.00)</td>
</tr>
<tr>
 <th>Debit Amount:</th>
 <td>$180.00</td>
</tr>
</tbody></table>

 <form action="https://www.coinpayments.net/index.php" method="post"> 
<input type="hidden" name="cmd" value="_pay_simple"> <input type="hidden" name="reset" value="1"> <input type="hidden" name="merchant" value="bc3456d2b85235d48eaaf93ccef7ee19"> <input type="hidden" name="currency" value="USD"> <input type="hidden" name="amountf" value="<?php echo"$hop_amount"; ?>"> <input type="hidden" name="invoice" value="PPLRPLGNGJ1NNZ440SED9Q6NWW605V3R"> <input type="hidden" name="first_name" value="<?php echo"$SEshopname"; ?>">  <input type="hidden" name="email" value="<?php echo"$SEshopmail"; ?>"> <input type="hidden" name="ipn_url" value="www.hyipcrypto-miners.com/index.php/status/postback/48/"> <input type="hidden" name="success_url" value="www.hyipcrypto-miners.com/?a=return_egold&amp;process=yes"> <input type="hidden" name="cancel_url" value="www.hyipcrypto-miners.com/?a=return_egold&amp;process=yes"> <input type="hidden" name="item_name" value="Deposit to Hyipcrypto-miners.com User <?php echo"$SEshopname"; ?>"> <span class="deposit-process-wrap"> 
<input type="submit" value="Process" class="sbmt deposit-process"> </span> <span class="deposit-cancel-wrap"> <input type="button" value="Cancel" class="sbmt deposit-cancel" onClick="history.go(-1)"> </span> </form> 
  </div>

	</div> 
</div>




 </div>
</div>

</div>

<div id="acc_footerWrapper">
	<div id="acc_footer">

        <div class="copyright">2017 © <a href="http://Hyipcrypto-miners.com/" class="forCopyright">Hyipcrypto-miners.com</a>. All Rights Reserved.</div>
        <div class="terms"><a href="http://Hyipcrypto-miners.com/?a=rules">Terms of Service</a> | <a href="http://Hyipcrypto-miners.com/?a=rules#privacy_policy">Privacy Policy</a> | <a href="http://Hyipcrypto-miners.com/?a=rules#anti_spam_policy">Anti-Spam Policy</a></div>
        
	</div>
</div>




</body></html>