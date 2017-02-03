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
	}else if($action == 'incidentAlert'){
		$sql1="select * from notifications";
		$res1=mysql_query($sql1);
		$count1 = 0;
		while($result1=mysql_fetch_array($res1)){
			$count1 = $result1['incident_alert'];	
		}
		echo $count1;
	}else if($action == 'shuttleAlert'){
		$sql1="select * from notifications";
		$res1=mysql_query($sql1);
		$count1 = 0;
		while($result1=mysql_fetch_array($res1)){
			$count1 = $result1['shuttle_alert'];	
		}
		echo $count1;
	}else if($action == 'knightAlert'){
		$sql1="select * from notifications";
		$res1=mysql_query($sql1);
		$count1 = 0;
		while($result1=mysql_fetch_array($res1)){
			$count1 = $result1['knight_alert'];	
		}
		echo $count1;
	}
?>