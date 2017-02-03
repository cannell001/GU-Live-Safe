<?php

session_start();
if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
include("dbconnection.php");

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
	$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
	}
	else{
		$out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
		//header('Location:'.$_REQUEST['page']);
	
}
?>