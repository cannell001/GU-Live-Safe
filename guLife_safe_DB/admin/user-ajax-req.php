<?php
	include "dbconnection.php";
	$action = $_REQUEST['action'];
	if($action == 'emergencyAlert'){
		$sql="select * from notifications";
		$res=mysql_query($sql);
		$count = 0;
		while($result=mysql_fetch_array($res)){
			$count = $result['emergency_alert'];	
		}
		echo $count;
	}
?>