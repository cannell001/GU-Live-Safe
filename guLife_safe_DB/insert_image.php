<?php	
include "admin/dbconnection.php";
//insert Incident Image 
$action=$_REQUEST['action'];
	if($action=='image'){
		define ("MAX_SIZE","6144");
	 function getExtension($str) {
			 $i = strrpos($str,".");
			 if (!$i) { return ""; }
			 $l = strlen($str) - $i;
			 $ext = substr($str,$i+1,$l);
			 return $ext;
	 }
	 $imageName= substr(str_shuffle("0123456789"), 0, 3). substr(str_shuffle("0123456789"), 0, 4);
	 if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	$image =$_FILES["file"]["name"];
	$uploadedfile = $_FILES['file']['tmp_name'];
	if ($image) 
	{
	$filename = stripslashes($_FILES['file']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
	{
	echo "Unknown Image extension ";
	}elseif($extension=="jpg" || $extension=="jpeg" )
	 {
	 $uploadedfile = $_FILES['file']['tmp_name'];
	 $src = imagecreatefromjpeg($uploadedfile);
	 }
	 else if($extension=="png")
	 {
	 $uploadedfile = $_FILES['file']['tmp_name'];
	 $src = imagecreatefrompng($uploadedfile);
	 }
	 else 
	 {
	 $src = imagecreatefromgif($uploadedfile);
	 }
	list($width,$height)=getimagesize($uploadedfile);
	$newwidth=1000;
	$newheight=625;
	//$newheight=($height/$width)*$newwidth;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	$extension = explode("/", $_FILES["file"]["type"]);
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_name= $imageName.".".$extension[1];
	$message=$_REQUEST['message'];
	$email_id=$_REQUEST['email_id'];
  $query ="insert into incident_reports (email_id,message,image_path) values('$email_id','$message','$file_name')";
	$report=mysql_query($query);
	if($report){
		$desired_dir="admin/report";
			 if(is_dir($desired_dir)==false){
	mkdir("$desired_dir", 0700);
	imagejpeg($tmp,$desired_dir."/".$file_name,100);
	}else{
	imagejpeg($tmp,$desired_dir."/".$file_name,100);
	}
	imagedestroy($src);
	imagedestroy($tmp);
			//echo "ss";
	header("Location:incident.php?ss");
	}else{
			//echo "ff";
			header("Location:incident.php?ff");
	}
	}
	}
	}
	?>