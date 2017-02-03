<?php
session_start();
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
$email_id=$_REQUEST['email_id'];
if($action == 'updatecontact'){
  //$email_id=$_SESSION['email'];
	$contact1=$_REQUEST['contact1'];
    $contact2=$_REQUEST['contact2'];
	$contact3=$_REQUEST['contact3'];
	$contact4=$_REQUEST['contact4'];
	$contact5=$_REQUEST['contact5'];
	$message=$_REQUEST['message'];
 $updateQry="update help_me set contact1='$contact1',contact2='$contact2',contact3='$contact3',contact4='$contact4',contact5='$contact5',message='$message' where email_id='$email_id'";
	$updatecontact=mysql_query($updateQry);
	if($updatecontact){
		$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
     //header("Location:shuttle_service.php?ss");
    
	}else{
		$out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
	//header("Location:shuttle_service.php?ff");
	}

}else if($action == 'updatestatus'){
	$status=$_REQUEST['status'];
	$message=$_REQUEST['message'];
	$email_id=$_REQUEST['email_id'];
	$current_location=$_REQUEST['current_location'];
	
	$timestamp = $_REQUEST['time'];
   $sql="select count(1) as cnt from help_requests where email_id='$email_id'";
   $res=mysql_query($sql);
   
   if($ss=mysql_fetch_assoc($res)){
	   if($ss['cnt'] == '0'){
	  $qry="insert into help_requests (message,email_id,current_location,time)values('$message','$email_id','$current_location','$timestamp')";
	  $reslt=mysql_query($qry);
	  if($reslt){
				$sql="select * from notifications";
				$res=mysql_query($sql);
				while($result=mysql_fetch_array($res)){
				$count=$result['emergency_alert'];
		
	}

	$updateQry1="update notifications set emergency_alert=$count+1 where id=1";
	$updateStatus=mysql_query($updateQry1);
	
		$out=array('status'=>'success');
		$result1= json_encode($out);
        echo $result1;
	}else{
		$out=array('status'=>'fail');
$result2= json_encode($out);
echo $result2;
	
	}
	   
   }else{
	$updateQry="update help_requests set status='$status',message='$message',current_location='$current_location',time='$timestamp' where email_id='$email_id'";
	$updateStatus=mysql_query($updateQry);
	if($updateStatus){
		$sql="select * from notifications";
				$res=mysql_query($sql);
				while($result=mysql_fetch_array($res)){
				$count=$result['emergency_alert'];
		
	}

	$updateQry1="update notifications set emergency_alert=$count+1 where id=1";
	$updateStatus=mysql_query($updateQry1);
		$out=array('status'=>'success');
		$result1= json_encode($out);
        echo $result1;
	}else{
		$out=array('status'=>'fail');
$result2= json_encode($out);
echo $result2;
	
	}
   }
}
}
?>