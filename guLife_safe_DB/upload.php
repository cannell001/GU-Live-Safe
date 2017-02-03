<?php
header('Access-Control-Allow-Origin: *');
 ini_set('max_execution_time', 600); 


$location = $_POST['directory'];
$message=$_POST['message'];
$time=$_POST['time'];
$current_location=$_POST['current_location'];
$email_id=$_POST['email_id'];
$uploadfile = $_POST['fileName'];
$uploadfilename = $_FILES['file']['tmp_name'];
//test
if(strpos($uploadfile,'%'>-1)){
$uploadfile = str_replace('%','%25',$uploadfile);
}
if(move_uploaded_file($uploadfilename, $location.'/'.$uploadfile)){
include "dbconnection.php";
$qry="insert into incident_reports(email_id,image_path,message,time,current_location) values('$email_id','$uploadfile','$message','$time','$current_location')";
$res=mysql_query($qry);
$sql="select * from notifications";
				$res=mysql_query($sql);
				while($result=mysql_fetch_array($res)){
				$count=$result['incident_alert'];
				}
				$updateQry1="update notifications set incident_alert=$count+1 where id=1";
	$updateStatus=mysql_query($updateQry1);
$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
      
} else {
      $out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
}

/*$target_path = "uploads/"; 
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
$_FILES['uploadedfile']['tmp_name'];
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{ 
 echo "ss"; 
} 
else
{ 
 echo "ff"; 
}*/
?>