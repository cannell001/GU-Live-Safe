<?php
session_start();
//http://localhost/guLife_safe/user_profile.php?action=profile&email_id=vinod001@knights.gannon.edu&password=123

//localhost/guLife_safe/user_profile.php?action=updateprofile&email_id=vinod001@knights.gannon.edu&username=shanti&phone=9988774466

//localhost/guLife_safe/user_profile.php?action=Users&email_id=vinod001@knights.gannon.edu

//localhost/guLife_safe/user_profile.php?action=changePassword&email_id=vinod001@knights.gannon.edu&password=121

include "dbconnection.php";
/*if (isset($_SERVER['HTTP_ORIGIN'])) {
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
    }*/
	
$action=$_REQUEST['action'];
if($action == 'profile'){
    $email_id=$_REQUEST['email_id'];
	$password=$_REQUEST['password'];
 $qry="select * from  users where email_id='$email_id'";
	$res=mysql_query($qry);
	if($result=mysql_fetch_assoc($res)){
       echo  $result= json_encode($result);
        
	}else{
		$out=array('status'=>'fail');
        $result= json_encode($out);
        echo $result;
	
	}

}if($action == 'updateprofile'){
  $email_id=$_REQUEST['email_id'];
	$username=$_REQUEST['username'];
    $phone=$_REQUEST['phone'];
	
 $updQry="update users set username='$username',phone='$phone' where email_id='$email_id'";
	$updtprofile=mysql_query($updQry);
	if($updtprofile){
		$out=array('status'=>'success');
		$result= json_encode($out);
		echo $result;
    
	}else{
		$out=array('status'=>'fail');
		$result= json_encode($out);
		echo $result;
	
	}

}//Delete Users
if($action=='Users'){
    $email_id=$_REQUEST['email_id'];
    $usr_qry="delete from users where email_id='$email_id'";
    $user=mysql_query($usr_qry);
    if($user){
	    $out=array('status'=>'success');
		$result= json_encode($out);
		echo $result;
    }else{
	    $out=array('status'=>'fail');
		$result= json_encode($out);
		echo $result;
	}
}if($action =='changePassword'){
    $email_id=$_REQUEST['email_id'];
    $password=$_REQUEST['password'];
    $usr_qry="update users set password='$password' where email_id='$email_id'";
    $password=mysql_query($usr_qry);
    if($password){
	    $out=array('status'=>'success');
		$result= json_encode($out);
		echo $result;
    }else{
	    $out=array('status'=>'fail');
		$result= json_encode($out);
		echo $result;
	}
}
?>