<?php
include "dbconnection.php";
define ("MAX_SIZE","10000");
 $email_id=$_REQUEST['email_id'];
 $imgData =$_REQUEST['image_path'];
$message=$_REQUEST['message'];
 $imageName= substr(str_shuffle("0123456789"), 0, 3). substr(str_shuffle("0123456789"), 0, 4);
 $name='GUI.jpeg';
 
$file='uploads/images/'.$imageName.$name;
$imgData1 = str_replace('data:image/png;base64,', '', $imgData);
echo $data1 = str_replace(' ', '+', $imgData1 );

$data = file_put_contents($file, base64_decode($data1));



 $sql="insert into incident_reports(message,image_path,email_id)values('$message','$file','$email_id')";
$res=mysql_query($sql);
if($res)
{
	$out=array('status'=>'success');
$result= json_encode($out);
 $result;
}
else{
	$out=array('status'=>'fail');
$result= json_encode($out);
$result;
}

/*
localhost/guLife_safe/byteEx.php?email_id=shanthismts787@vsmtsolution.com&image_path=Desert.jpeg&message=kfkfjkdfjkldfjdkfj
 */
 
?>

