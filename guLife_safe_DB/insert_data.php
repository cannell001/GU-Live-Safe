<?php
session_start();
ob_start();
include 'dbconnection.php';
//Insert Drivers...
$action=$_REQUEST['action'];
if($action=='drivers'){
	$driver_name=$_REQUEST['driver_name'];
    $phone=$_REQUEST['phone'];
$qry="insert into drivers (driver_name,driver_phone) values('$driver_name','$phone')";
	$query=mysql_query($qry);
	if($query){
		
		header("Location:view_drivers.php");
	}else{
		
		header("Location:add_drivers.php");
	}

}
//Update Drivers
if($action=='update_driver'){
	$driver_id=$_REQUEST['driver_id'];
	$driver_name=$_REQUEST['driver_name'];
$driver_phone=$_REQUEST['driver_phone'];
	$driver_qry="update drivers set driver_name='$driver_name',driver_phone='$driver_phone' where driver_id=$driver_id";
	$driver=mysql_query($driver_qry);
	if($driver){
		header("Location:view_drivers.php");
	}else{
		header("Location:view_drivers.php");
	}

}
//insert Security Guards

if($action=='guards'){
	$guard_name=$_REQUEST['guard_name'];
    $phone=$_REQUEST['phone'];
$quard_qry="insert into security_guards (guard_name,guard_phone) values('$guard_name','$phone')";
	$guard=mysql_query($quard_qry);
	if($guard){
		header("Location:view_security.php");
	}else{
	header("Location:view_security.php");
	}

}
//Update Guards
if($action=='update_guard'){
	$guard_id=$_REQUEST['guard_id'];
	$guard_name=$_REQUEST['guard_name'];
$guard_phone=$_REQUEST['guard_phone'];
	$guard_sql="update security_guards set guard_name='$guard_name',guard_phone='$guard_phone' where guard_id=$guard_id";
	$guard=mysql_query($guard_sql);
	if($guard){
		header("Location:view_security.php");
	}else{
		header("Location:view_security.php");
	}

}
//insert College Location

if($action=='location'){
	$loction_name=$_REQUEST['loction_name'];
$location_qry="insert into locations (loction_name) values('$loction_name')";
	$location=mysql_query($location_qry);
	if($location){
		header("Location:view_location.php");
	}else{
	header("Location:view_location.php");
	}

}
//Update Locations
if($action=='update_location'){
	$location_id=$_REQUEST['location_id'];
	$loction_name=$_REQUEST['loction_name'];
	$loca_sql="update locations set loction_name='$loction_name' where location_id=$location_id";
	$location=mysql_query($loca_sql);
	if($location){
		header("Location:view_location.php");
	}else{
		header("Location:view_location.php");
	}

}
ob_end_flush();

?>
