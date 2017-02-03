<?php
session_start();
include("admin/dbconnection.php");

$email_id=$_GET['email_id'];

$password=$_GET['password'];

$checkquery="SELECT * from users where email_id='$email_id' && password='$password'";
$checkresults=mysql_query($checkquery);
if(mysql_num_rows($checkresults)>0){

	 if(!empty($_REQUEST['email_id']))
	{
		unset($_SESSION['email_id']);
	}
	$_SESSION['email_id']=$_REQUEST['email_id'];
	echo "ss";
	}
	else{
		echo "ff";
		//header('Location:'.$_REQUEST['page']);
	
}
?>