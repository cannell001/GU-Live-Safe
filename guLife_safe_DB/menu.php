<script>
var getEmergencyAlerts = function(){
		//console.log('hi');
		$.ajax({
			type: "POST",
			url: 'user-ajax-req.php',
			data: "action=emergencyAlert",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(data){
				if(data.trim() != '0'){
					console.log(data);
					$("#emg").html('<i class="glyphicon glyphicon-align-justify"></i>Emergency Alert<span class="notification red">'+data+'</span>');
				}
			},
			dataType: "html"
		});
	};
	setInterval(function(){getEmergencyAlerts();}, 2000);
//incident alert
var getIncidentAlerts = function(){
		//console.log('hi');
		$.ajax({
			type: "POST",
			url: 'user-ajax-req.php',
			data: "action=incidentAlert",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(data){
				if(data.trim() != '0'){
					//console.log(data);
					$("#incident").html('<i class="glyphicon glyphicon-align-justify"></i>Incident Alert<span class="notification red">'+data+'</span>');
				}
			},
			dataType: "html"
		});
	};
	setInterval(function(){getIncidentAlerts();}, 2000);
//Shuttle alert
 var getShuttleAlerts = function(){
		//console.log('hi');
		$.ajax({
			type: "POST",
			url: 'user-ajax-req.php',
			data: "action=shuttleAlert",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(data){
				if(data.trim() != '0'){
					//console.log(data);
					$("#shuttle").html('<i class="glyphicon glyphicon-align-justify"></i>Shuttle Alert<span class="notification red">'+data+'</span>');
				}
			},
			dataType: "html"
		});
	};
	setInterval(function(){getShuttleAlerts();}, 2000);
//Knight alert	
	var getKnightAlerts = function(){
		//console.log('hi');
		$.ajax({
			type: "POST",
			url: 'user-ajax-req.php',
			data: "action=knightAlert",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(data){
				if(data.trim() != '0'){
					//console.log(data);
					$("#escort").html('<i class="glyphicon glyphicon-align-justify"></i>Knight Alert<span class="notification red">'+data+'</span>');
				}
			},
			dataType: "html"
		});
	};
	setInterval(function(){getKnightAlerts();}, 2000);
</script>
<ul class="nav nav-pills nav-stacked main-menu">
<li class="nav-header">Admin Menu</li>

<li><a class="ajax-link" href="view_users.php"><i
		class="glyphicon glyphicon-edit"></i><span> View Users</span></a></li>
		<?php
		include "dbconnection.php";
		$sql="select * from notifications";
	$res=mysql_query($sql);
	while($result=mysql_fetch_array($res)){
     $count=$result['emergency_alert'];
		
	}
		
		?>
		<li><a class="ajax-link" id="emg" href="view_helpme.php"><i
class="glyphicon glyphicon-align-justify"></i>Emergency Alert
<?=($count==0)?'':'<span class="notification red">'.$count.'</span>'?></a></li>



<?php
include "dbconnection.php";
	$sql1="select * from notifications";
	$resincident=mysql_query($sql1);
	while($incident=mysql_fetch_array($resincident)){
        $countincident=$incident['incident_alert'];
		
	}
		?>
<li><a class="ajax-link" id="incident" href="view_incident.php">
<i class="glyphicon glyphicon-align-justify"></i><span>View Incidents<?=($countincident==0)?'':'<span class="notification red">'.$countincident.'</span>'?></span></a></li>

<?php
		include "dbconnection.php";
		$sql1="select * from notifications";
	$resshuttle=mysql_query($sql1);
	while($shuttle=mysql_fetch_array($resshuttle)){
     $countshuttle=$shuttle['knight_alert'];
		
	}
		
		?>
<li><a class="ajax-link" id="shuttle" href="view_shuttle.php">
<i class="glyphicon glyphicon-align-justify"></i><span>View Shuttle Services<?=($countshuttle==0)?'':'<span class="notification red">'.$countshuttle.'</span>'?></span></a></li>
<?php
		include "dbconnection.php";
		$sql1="select * from notifications";
	$reskinght=mysql_query($sql1);
	while($knight=mysql_fetch_array($reskinght)){
     $countknight=$knight['knight_alert'];
		
	}
		
		?>
<li><a class="ajax-link" id="escort" href="view_knight.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Escort Services<?=($countknight==0)?'':'<span class="notification red">'.$countknight.'</span>'?></span></a></li>

	
 <li class="accordion">
<a href="#"><i class="glyphicon glyphicon-plus"></i><span>Drivers</span></a>
<ul class="nav nav-pills nav-stacked">
<li><a class="ajax-link" href="view_drivers.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Drivers</span></a></li>
<li><a class="ajax-link" href="add_drivers.php"><i
class="glyphicon glyphicon-align-justify"></i><span>Add Drivers</span></a></li>
</ul>
</li>

 <li class="accordion">
<a href="#"><i class="glyphicon glyphicon-plus"></i><span>Security</a>
<ul class="nav nav-pills nav-stacked">
<li><a class="ajax-link" href="view_security.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Security</span></a></li>
<li><a class="ajax-link" href="add_security.php"><i
class="glyphicon glyphicon-align-justify"></i><span>Add Security</span></a></li>
</ul>
</li>
<li class="accordion">
<a href="#"><i class="glyphicon glyphicon-plus"></i><span>Location</a>
<ul class="nav nav-pills nav-stacked">
<li><a class="ajax-link" href="view_location.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Location</span></a></li>
<li><a class="ajax-link" href="add_location.php"><i
class="glyphicon glyphicon-align-justify"></i><span> Add Location</span></a></li>
</ul>
</li>