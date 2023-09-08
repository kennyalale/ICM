<?php
//$link=@mysql_connect('localhost','root','');
//if (!$link) {
//echo"Connection destroy by network, Try Again". mysql_error();	
//}
//$select_db=mysql_select_db('world',$link);
//if (!$select_db) {
//	echo"Data file destroy by network,Try Again". mysql_error();
//}



$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bitcoin_update";
$prefix = "";
$bd = @mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
@mysql_select_db($mysql_database, $bd) or die("Could not select database");

?>