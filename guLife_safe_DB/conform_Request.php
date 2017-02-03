<?php
session_start();
ob_start();
include "dbconnection.php";
$action=$_REQUEST['action'];
if($action=='shuttle_request'){
	$shuttle_id=$_REQUEST['shuttle_id'];
	 $email_id=$_REQUEST['email_id'];
	 $current_loaction=$_REQUEST['current_location'];
   $dest_location=$_REQUEST['destination_location'];
	 $shuttle_message=$_REQUEST['shuttle_message'];
	 $driver_id=$_REQUEST['driver_id'];
    $shuttle_status=$_REQUEST['shuttle_status'];
$shuttle_insert="insert into shuttle_requests (shuttle_id,email_id,current_location,destination_location,shuttle_message,driver_id) values('$shuttle_id','$email_id','$current_loaction','$dest_location','$shuttle_message','$driver_id')";
	$shuttle=mysql_query($shuttle_insert);
	if($shuttle){
		//echo "ss";
		$qry="update shuttle_services set shuttle_status='Processing' where shuttle_id=$shuttle_id";
   $update=mysql_query($qry);
	header("location:view_shuttle.php");
    
	}else{
		//echo "ff";
	header("location:view_shuttle.php");
	} 
}
//Completed status
if($action=='Completed'){
	$shuttle_id=$_REQUEST['shuttle_id'];
    $status=$_REQUEST['status'];
$update_stu="update shuttle_services set shuttle_status='Completed' where shuttle_id=$shuttle_id";
$stu=mysql_query($update_stu);
if($stu){
	$update_status="update shuttle_requests set request_shtle_status='Completed' where shuttle_id=$shuttle_id";
$status=mysql_query($update_status);
	header("location:view_shuttle.php");
}else{
	header("location:view_shuttle.php");
}
}
//knight_status_request
if($action=='knight_status_request'){
	$gu_knights_id=$_REQUEST['gu_knights_id'];
	 $email_id=$_REQUEST['email_id'];
	$current_location=$_REQUEST['current_location'];
$dest_location=$_REQUEST['destination_location'];
	 $message=$_REQUEST['guknights_message'];
	$guard_id=$_REQUEST['guard_id'];
    $knight_status=$_REQUEST['knight_status'];
 $knight_sta="insert into knight_service_requests(gu_knights_id,email_id,current_location,destination_location,guknights_message,guard_id)values($gu_knights_id,'$email_id','$current_location','$dest_location','$message',$guard_id)";
	$knight=mysql_query($knight_sta);
	if($knight){
		//echo "ss";
		$qry="update guknights_service set knight_status='Processing' where gu_knights_id=$gu_knights_id";
     $update=mysql_query($qry);
	 header("location:view_knight.php");
    
	}else{
	//echo "ff";
		header("location:view_knight.php");
	} 
}

//Shuttle Completed status
if($action=='knight_Completed'){
	$gu_knights_id=$_REQUEST['gu_knights_id'];
    $knight_status=$_REQUEST['knight_status'];
$updt_stu="update guknights_service set knight_status='Completed' where gu_knights_id=$gu_knights_id";
$stu=mysql_query($updt_stu);
if($stu){
	$update_status="update knight_service_requests set knight_req_status='Completed' where gu_knights_id=$gu_knights_id";
$status=mysql_query($update_status);
	header("location:view_shuttle.php");
}else{
	header("location:view_shuttle.php");
}
}
ob_end_flush();
?>