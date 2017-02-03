<?php
session_start();
include "dbconnection.php";
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
$email_id=$_REQUEST['email_id'];
$sql="SELECT * from help_me where email_id='$email_id'"; 
$res=mysql_query($sql);
if($result= mysql_fetch_assoc($res)){
$out=$result;
echo $result= json_encode($out);		
}else{
$out1=array('status'=>'fail');
$result1= json_encode($out1);
echo $result1;
}

?>