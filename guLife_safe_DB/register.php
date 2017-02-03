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
include "dbconnection.php";
$name = $_GET['name'];
$email_id = $_GET['email_id'];
$password1 = $_GET['password'];
$password=md5($password1);
    $phone=$_REQUEST['phone'];
$phone = $_GET['phone'];
 $sql="select count(1) as cnt from users where email_id='$email_id'";
		$results=mysql_query($sql);
		$count=0;
		if($row=mysql_fetch_array($results))
		{
			 $count+=$row['cnt'];	
		}
		if($count>0)
		{
			 $out=array('status'=>'This email id already exists');
$result= json_encode($out);
echo $result;


		}
		else{
			$query = "insert into users (username,email_id,password,phone)values('$name','$email_id','$password','$phone')";
$res=mysql_query($query);
$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
		}
		
 ?>