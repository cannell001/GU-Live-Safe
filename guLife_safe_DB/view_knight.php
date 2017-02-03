<?php
session_start();
include "dbconnection.php";
if(isset($_SESSION['adminuser'])=="")
    header("location:index.php");

$sql="update notifications set knight_alert = 0 where id = 1";
	$res=mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>View | Shuttle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
   <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="view_users.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>GULivesafe</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                   
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
              
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <?php include 'menu.php'?>
                    <!--<label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>-->
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
       
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Knight Services</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
    <th>S.No</th>
        <th>Email</th>
        <th>Current Location</th>
        <th>Destination Location</th>
        <th>Pickup Time</th>
        <th>Message</th>
        <th>Guard Status</th>
        <th>Status</th>
        <th>Operations</th>
    </tr>
    </thead>
    <tbody>
    <?php $count=1;
    $sql="select * from guknights_service";
    $res=mysql_query($sql);
    while($user=mysql_fetch_assoc($res))
    {
        ?>
        
    <tr>
    <td><?= $count ?></td>
        <td><?=$user['email_id']?></td>
      <td><?=$user['current_location']?></td>
      <td><?=$user['destination_location']?></td>
      <td><?=$user['time']?></td>
      <td><?=$user['guknights_message']?></td>
      <?php
        if($user['knight_status']=='Not Conformed' ){
        ?>
      <td> 
  <select name="location" onChange="guard_id<?=$count?>.value=this.value">
   <option>Select Guards</option>
  <?php
  include "dbconnection.php";
  $qry="select * from security_guards";
  $res1=mysql_query($qry);
  $guard_id="";
 
  while($driver=mysql_fetch_assoc($res1)){
     echo $guard_id=$driver['guard_id'];
  ?>
   <option value="<?=$driver['guard_id']?>"><?=$driver['guard_name']?></option>
 <?php
  }
?>  
</select>
</td>
     <td>
     <form action="conform_Request.php" method="post" onsubmit="" >
      <input type="hidden" name="gu_knights_id" value="<?=$user['gu_knights_id']?>">
     <input type="hidden" name="email_id" value="<?=$user['email_id']?>">
     <input type="hidden" name="current_location" value="<?=$user['current_location']?>">
     <input type="hidden" name="destination_location" value="<?=$user['destination_location']?>">
     <input type="hidden" name="guknights_message" value="<?=$user['guknights_message']?>">
     <input type="hidden" name="knight_status" value="<?=$user['knight_status']?>">
    <input type="hidden" name="guard_id" id="guard_id<?=$count?>" onkeyup="noneErrors(this,fnameError);">
           <span id="fnameError" style="color:red;">  
  <button class="btn btn-info" name="action" value="knight_status_request" >Conform Request</button></td>
        </form>
    <?php       
        }elseif($user['knight_status']=='Processing'||$user['knight_status']=='Completed'){
        ?>
    <td><?=$user['knight_status']?></td>
    <td><a href="conform_Request.php?action=knight_Completed&gu_knights_id=<?=$user['gu_knights_id']?>&knight_status=<?=$user['knight_status']?>"><button class="btn btn-info">Completed</button></a></td>
    <?php
        }elseif($user['knight_status']=='Cancelled' ){
        ?>
        <td><?=$user['knight_status']?></td>
        <td><a href=""><button class="btn btn-info">Cancelled</button></a></td>
<?php       
        }
        ?>
        <td class="center">
		<?php
		if($user['knight_status']=='Processing'||$user['knight_status']=='Not Conformed'){
		?>
        <a class="btn btn-danger" href="delete_data.php?action=knight-cancel&gu_knights_id=<?php echo $user['gu_knights_id']?>">
           
            Cancel Request
            </a>
			<?php
		}elseif($user['knight_status']=='Completed'){
		?>
		<a class="btn btn-danger" href="#">
           
            Cancel
            </a>
			<?php
		}elseif($user['knight_status']=='Cancelled'){
		?>
		<a class="btn btn-danger" href="#">
           
            Cancelled
            </a>
			<?php
		}
		?>
        </td>
    </tr>

    <?php
    $count++;
    }
    ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
    </div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    <!-- Ad, you can remove it -->
    <div class="row">
    </div>
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
        function validateContact(){
        var driver_id=document.getElementById('driver_id').value;
        if(driver_id=='' ){
document.getElementById('fnameError').innerHTML='Please Select field';
return false;
}
return true;
}
function noneErrors(id1,id2){
    if(id1.value!=''){
        id2.innerHTML='';
    }
}
</script>
<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>