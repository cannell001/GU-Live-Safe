<?php
session_start();
ob_start();
include 'dbconnection.php';
//Deactive Status Update Users...
$action=$_REQUEST['name'];
if($action=='Deactive'){
	$user_id=$_REQUEST['user_id'];
    $status=$_REQUEST['status'];
$update_deac="update users set status='Deactive' where user_id=$user_id";
$dec=mysql_query($update_deac);
if($dec){
	header("location:view_users.php");
}else{
	header("location:view_users.php");
}
}
//
//Active Status Update Users...
$action=$_REQUEST['name'];
if($action=='Active'){
	$user_id=$_REQUEST['user_id'];
    $status=$_REQUEST['status'];
$update_act="update users set status='Active' where user_id=$user_id";
$act=mysql_query($update_act);
if($act){
	header("location:view_users.php");
}else{
	header("location:view_users.php");
}
}

ob_end_flush();
?>