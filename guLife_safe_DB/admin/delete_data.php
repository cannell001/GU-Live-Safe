<?php
session_start();
ob_start();
include "dbconnection.php";
$action=$_REQUEST['action'];
//Delete Drivers
if($action=='drivers'){
$driver_id=$_REQUEST['driver_id'];
$driver_qry="delete from drivers where driver_id=$driver_id";
$driver=mysql_query($driver_qry);
if($driver){
	header("Location:view_drivers.php");
}else{
	header("Location:view_drivers.php");
}
}

//Delete Security Guards
if($action=='guards'){
$guard_id=$_REQUEST['guard_id'];
$guard_qry="delete from security_guards where guard_id=$guard_id";
$security=mysql_query($guard_qry);
if($security){
	header("Location:view_security.php");
}else{
	header("Location:view_security.php");
}
}
//Delete Locations
if($action=='location'){
$location_id=$_REQUEST['location_id'];
$sec_qry="delete from locations where location_id=$location_id";
$security=mysql_query($sec_qry);
if($security){
	header("Location:view_location.php");
}else{
	header("Location:view_location.php");
}
}
//Delete Users
if($action=='Users'){
$user_id=$_REQUEST['user_id'];
$usr_qry="delete from users where user_id=$user_id";
$user=mysql_query($usr_qry);
if($user){
	header("Location:view_users.php");
}else{
	header("Location:view_users.php");
}
}
//Delete Shuttles
if($action=='shuttle'){
$shuttle_id=$_REQUEST['shuttle_id'];
$shut_qry="delete from shuttle_services where shuttle_id=$shuttle_id";
$shuttle=mysql_query($shut_qry);
if($shuttle){
	header("Location:view_shuttle.php");
}else{
	header("Location:view_shuttle.php");
}
}
//Delete Knights Services
if($action=='knights'){
$gu_knights_id=$_REQUEST['gu_knights_id'];
$knigt_qry="delete from guknights_service where gu_knights_id=$gu_knights_id";
$knight=mysql_query($knigt_qry);
if($knight){
	header("Location:view_knight.php");
}else{
	header("Location:view_knight.php");
}
}
//delete help me messages
if($action == 'helpme'){
$id=$_REQUEST['id'];
$help_qry="delete from help_requests where id=$id";
$help=mysql_query($help_qry);
if($help){
	header("Location:view_helpme.php");
}else{
	header("Location:view_helpme.php");
}
}
ob_end_flush();
?>