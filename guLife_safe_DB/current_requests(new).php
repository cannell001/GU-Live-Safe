<?php
session_start();
include "dbconnection.php";
//http://localhost/guLife_safe/current_requests(new).php?name=shuttle_service&email_id=shanthismts787@vsmtsolution.com

//http://localhost/guLife_safe/current_requests(new).php?name=knight_service&email_id=shanthismts787@vsmtsolution.com

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
   
$action=$_GET['name'];
$email_id=$_GET['email_id'];
if($action=='shuttle_service'){

$sql="
SELECT 
    driver_name, driver_phone,current_location,destination_location,shuttle_message,shtle_request_id,shuttle_id,request_shtle_status
FROM
    drivers dr
        INNER JOIN
    shuttle_requests sr ON dr.driver_id = sr.driver_id and sr.email_id='$email_id' and request_shtle_status !='Cancelled' and request_shtle_status !='Completed'";
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
echo json_encode($knarray);
  } 
  else if($action=='knight_service'){
	 
$email_id=$_GET['email_id'];
 $sql2="
SELECT 
    guard_name, guard_phone,current_location,destination_location,guknights_message,gu_knights_id,knight_id,knight_req_status
FROM
    security_guards Sg
        INNER JOIN
    knight_service_requests ks ON Sg.guard_id = ks.guard_id and ks.email_id='$email_id' and knight_req_status !='Cancelled' and knight_req_status !='Completed'"; 
$res2=mysql_query($sql2);
$sharray=array();
//$shuttle=array()
if($res2){
while($result1= mysql_fetch_assoc($res2)){
	$result1['service']="Shuttleservice";
array_push($sharray,$result1);
}
}
echo json_encode($sharray);
}
//print_r($knarray);

?>