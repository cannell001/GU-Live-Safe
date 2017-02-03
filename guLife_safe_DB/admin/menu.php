<script>
var getEmergencyAlerts = function(){
		console.log('hi');
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

<li class="accordion">
<a href="#"><i class="glyphicon glyphicon-plus"></i><span>Services</a>
<ul class="nav nav-pills nav-stacked">
<li><a class="ajax-link" href="view_incident.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Incidents</span></a></li>
<li><a class="ajax-link" href="view_shuttle.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Shuttle Services</span></a></li>
<li><a class="ajax-link" href="view_knight.php"><i
class="glyphicon glyphicon-align-justify"></i><span>View Knight Services</span></a></li>
</ul>
</li>	
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