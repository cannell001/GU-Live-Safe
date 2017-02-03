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
ob_start();
include 'dbconnection.php';
//Insert Users...
$action=$_REQUEST['action'];
if($action=='register'){
	$username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
	$password1=$_REQUEST['password'];
	$password=md5($password1);
    $phone=$_REQUEST['phone'];
	$parts = explode("@", $email);
     $sss= $parts[0];
	     $parts[1];
  if($parts[1]=="vsmtsolution.com"){
	  $ss=$parts[1];
       $ss;
	   $result = $sss . '@' . $ss;
	  $qry="insert into users (username,email_id,password,phone) values('$username','$result','$password','$phone')";
	$query=mysql_query($qry);
	 $_SESSION['success']='success';
	 echo "ss";
	//header("Location:register.php");
  }else{
	   echo "ff";
	  $_SESSION['fail']='fail';
	//header("Location:register.php");
  }

}

//Insert Shuttle Services
if($action=='shuttle'){
	$email_id=$_REQUEST['email_id'];
	$time=$_REQUEST['time'];
	$location=$_REQUEST['location'];
    $dest_location=$_REQUEST['dest_location'];
	$message=$_REQUEST['message'];
	
	$shuttle_insert="insert into shuttle_services (email_id,time,current_location,destination_location,shuttle_message) values('$email_id','$time','$location','$dest_location','$message')";
	$shuttle=mysql_query($shuttle_insert);
	if($shuttle){
		$sql="select * from notifications";
				$res=mysql_query($sql);
				while($result=mysql_fetch_array($res)){
				$count=$result['shuttle_alert'];
				}
				$updateQry1="update notifications set shuttle_alert=$count+1 where id=1";
				
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
}

//Insert Knight Services
	if($action=='knight_service'){
	$email_id=$_REQUEST['email_id'];
		$time=$_REQUEST['time'];
	$current_location=$_REQUEST['location'];
    $destination_location=$_REQUEST['dest_location'];
	$guknights_message=$_REQUEST['message'];
	$knight_insert="insert into guknights_service (email_id,time,current_location,destination_location,guknights_message) values('$email_id','$time','$current_location','$destination_location','$guknights_message')";
	$knight=mysql_query($knight_insert);
	if($knight){
		$sql="select * from notifications";
				$res=mysql_query($sql);
				while($result=mysql_fetch_array($res)){
				$count=$result['knight_alert'];
				}
				$updateQry1="update notifications set knight_alert=$count+1 where id=1";
  
		$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
     }
      else{
	
      	$out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
	}
	}
//Insert video url code 
if($action=='url'){
	$file=$_REQUEST['file'];
	$email_id=$_REQUEST['email_id'];
	$message=$_REQUEST['message'];
	$incident_insert="insert into incident_reports (email_id,image_path,message) values('$email_id','$file','$message')";
	$incident=mysql_query($incident_insert);
	if($incident){
    header("Location:incident.php?ss");
	} else{
	header("Location:incident.php?ff");
	}
	}

//Cancel Knight Requests
if($action=='knight_cancel'){
	$knight_id=$_REQUEST['knight_id'];
	$gu_knights_id=$_REQUEST['gu_knights_id'];
$can_stu="update knight_service_requests set knight_req_status='Cancelled' where knight_id=$knight_id";
$cancel=mysql_query($can_stu);
if($cancel){
	$cancel_status="update guknights_service set knight_status='Cancelled' where gu_knights_id=$gu_knights_id";
$cancl=mysql_query($cancel_status);
	//header("location:current_requests.php");
$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
}else{
	//header("location:current_requests.php");
	$out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
}
}
//Cancel Shuttle Requests
if($action=='shuttle_cancel'){
	$shtle_request_id=$_REQUEST['shtle_request_id'];
	$shuttle_id=$_REQUEST['shuttle_id'];
$shut_can="update shuttle_requests set request_shtle_status='Cancelled' where shtle_request_id=$shtle_request_id";
$cancel_shut=mysql_query($shut_can);
if($cancel_shut){
	$cancel_shuttle="update shuttle_services set shuttle_status='Cancelled' where shuttle_id=$shuttle_id";
$cancel_stu=mysql_query($cancel_shuttle);
$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
	//header("location:current_requests.php");
}else{
	$out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
	//header("location:current_requests.php");
}
}

//Help Me Message 
if($action=='message'){
	$email_id=$_REQUEST['email_id'];
	$contact1=$_REQUEST['contact1'];
    $contact2=$_REQUEST['contact2'];
	$contact3=$_REQUEST['contact3'];
	$contact4=$_REQUEST['contact4'];
	$contact5=$_REQUEST['contact5'];
	$message=$_REQUEST['message'];
	
$sql="select count(*) as count from help_me where email_id='$email_id'";
$rs=mysql_query($sql);
if($row=mysql_fetch_assoc($rs)){
	$count=$row['count'];
	if($count==0){
	$helpmesg="insert into help_me (email_id,contact1,contact2,contact3,contact4,contact5,message) values('$email_id','$contact1','$contact2','$contact3','$contact4','$contact5','$message')";
	$helpme=mysql_query($helpmesg);
	if($helpme){
		$out=array('status'=>'success');
		$result= json_encode($out);
		echo $result;
	}else{
		$out=array('status'=>'fail');
		$result= json_encode($out);
		echo $result;
	
	}
	
}
else{
	$email_id=$_REQUEST['email_id'];
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
	
	}
}
}
}


ob_end_flush();
?>