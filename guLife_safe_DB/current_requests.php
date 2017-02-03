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
$email_id=$_GET['email_id'];

include "admin/dbconnection.php";
$sql="
SELECT 
    guard_name, guard_phone,current_location,destination_location,guknights_message,gu_knights_id,knight_id
FROM
    security_guards Sg
        INNER JOIN
    knight_service_requests ks ON Sg.guard_id = ks.guard_id and ks.email_id='$email_id'"; 
$res=mysql_query($sql);
$array1=array();
$knarray=array();
$sharray=array();
//$shuttle=array()
if($res){
while($result= mysql_fetch_assoc($res)){
	$result['service']="Knightservice";
array_push($knarray,$result);
}
}
//print_r($knarray);
$sql="
SELECT 
    driver_name, driver_phone,current_location,destination_location,shuttle_message,shtle_request_id,shuttle_id
FROM
    drivers dr
        INNER JOIN
    shuttle_requests sr ON dr.driver_id = sr.driver_id and sr.email_id='$email_id'";
$res=mysql_query($sql);
//$shuttle=array()
if($res){
while($result= mysql_fetch_assoc($res)){
	$result['service']="Shuttleservice";
array_push($knarray,$result);
}
}
//print_r($knarray);
echo json_encode($knarray);
?>
