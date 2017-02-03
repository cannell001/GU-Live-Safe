<!DOCTYPE html>
<?php
session_start();
?>
<html>
<body>
<h4>Menu</h4>
<ul class="dropdown-menu submnu_pos">
          <li><a href="incident.php">Report incident</a></li>
          <li><a href="shuttle_service.php">Shuttle Service</a></li>
          <li><a href="knight_service.php">Knight Service</a></li>
          <li><a href="logout.php">Logout</a></li> 
        </ul>
<center>
<h4>Shuttle Services</h4>
<form action="insert.php" method="get">
 <input type="hidden" name="email_id" value="<?=$_SESSION['email']?>">
 Select Location
  <select name="location">
   <option>Select Location</option>
  <?php
  include "admin/dbconnection.php";
  $qry="select * from locations";
  $res=mysql_query($qry);
  while($locations=mysql_fetch_assoc($res)){
  ?>
   <option value="<?=$locations['loction_name']?>"><?=$locations['loction_name']?></option>
 <?php
  }
?>  
</select>
  <br><br> <br>
  Destinatio Location
  <input type="text" name="dest_location" >
  <br><br>
  Message
  <textarea name="message" rows="3" col="12"></textarea>
    <br><br>
  <button type="submit" name="action" value="shuttle">Submit</button>
</form>
<center>
</body>
</html>

