<?php
session_start();
include "admin/dbconnection.php";
$name = $_GET['name'];
$email_id = $_GET['email_id'];
$password = $_GET['password'];
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
			 echo "This email id already exists";

		}
		else{
			$query = "insert into users (username,email_id,password,phone)values('$name','$email_id','$password','$phone')";
$res=mysql_query($query);
echo "ss";
		}
		
 ?>