<?php
include "admin/dbconnection.php";
$qry="select * from incident_reports";
$res=mysql_query($qry);
while($result=mysql_fetch_assoc($res)){
	//echo $result['image_path'];


?>
<img src="<?php echo $result['image_path']?>">
<?php
}
?>