<?php
$link=@mysql_connect('localhost','u575327465_root','8T#lX[s@h~');
if (!$link) {
echo"Connection destroy by network, Try Again". mysql_error();	
}
$select_db=mysql_select_db('u575327465_db',$link);
if (!$select_db) {
	echo"Data file destroy by network,Try Again". mysql_error();
}
?>