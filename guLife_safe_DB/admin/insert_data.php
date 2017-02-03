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
//insert Portfolio
	if($action=='portfolio'){
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
	$title=$_REQUEST['title'];
	$site_url=$_REQUEST['site_url'];
	$editor1=$_REQUEST['editor1'];
	$query ="insert into portfolio (title,site_url,image_path,description) values('$title','$site_url','$file_name','$editor1')";
	$question=mysql_query($query);
	if($question){
		$desired_dir="portfolio";
			 if(is_dir($desired_dir)==false){
	mkdir("$desired_dir", 0700);
	imagejpeg($tmp,$desired_dir."/".$file_name,100);
	}else{
	imagejpeg($tmp,$desired_dir."/".$file_name,100);
	}
	imagedestroy($src);
	imagedestroy($tmp);
		//echo "ss";
		header("Location:view_prorfolio.php?ss");
	}else{
			//echo "ff";
		header("Location:view_prorfolio.php?ff");
	}
	}
	}
	}



//Update Portfolio
if($action=='update_portfolio'){
	define ("MAX_SIZE","6144");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}

$p_id=$_REQUEST['p_id'];
$title=$_REQUEST['title'];
$site_url=$_REQUEST['site_url'];
$image=$_REQUEST['image'];
$editor1=$_REQUEST['editor1'];	
$file_name1 =$_FILES['file']['name'];
if($file_name1){
//Update with image
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
$updatequery="update portfolio set title='$title',site_url='$site_url',image_path='$file_name',description='$editor1'where p_id='$p_id'";
if(mysql_query($updatequery))
{
$desired_dir="portfolio";
if(is_dir($desired_dir)==false){
mkdir("$desired_dir", 0700);
imagejpeg($tmp,$desired_dir."/".$file_name,100);		// Create directory if it does not exist
}else{
imagejpeg($tmp,$desired_dir."/".$file_name,100);
}
imagedestroy($src);
imagedestroy($tmp);
//echo "ss";
header("Location:view_prorfolio.php");
}else{
	//echo "ff";
header("Location:view_prorfolio.php");
}
}
}
}
else
{
//Update with out image 
$updatequery="update portfolio set title='$title',description='$editor1' where p_id='$p_id'";
if(mysql_query($updatequery))
{

header("Location:view_prorfolio.php");
}
else{

header("Location:view_prorfolio.php");
}
}
}

ob_end_flush();

?>
