<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Incident</title>
<script type="text/javascript">
// <![CDATA[
function display(obj,id1,id2) {
txt = obj.options[obj.selectedIndex].value;
document.getElementById(id1).style.display = 'none';
document.getElementById(id2).style.display = 'none';
if ( txt.match(id1) ) {
document.getElementById(id1).style.display = 'block';
}
if ( txt.match(id2) ) {
document.getElementById(id2).style.display = 'block';
}
}
// ]]>
</script>
</head>
<body>
<h4>Menu</h4>
		<ul class="dropdown-menu submnu_pos">
          <li><a href="current_requests.php">Current Requests</a></li>
          <li><a href="shuttle_service.php">Shuttle Service</a></li>
          <li><a href="knight_service.php">Knight Service</a></li>
          <li><a href="logout.php">Logout</a></li> 
        </ul>
<center>
<h4>Report An Incident</h4>
<form action="insert.php" method="post">

<table width="340" cellspacing="0" cellpadding="2">
<thead>
<tr>
<td class="title">Report Incident:</td>
<td class="field">
<select name="type" onchange="display(this,'videoUrl','image');">
<option>Select Type Report an Incident:</option>
<option value="image">Image</option>
<option value="videoUrl">videoUrl</option>
</select>
</td>
</tr>
</thead>
<tbody id="videoUrl" style="display: none;">
<form action="insert.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="email_id" value="<?=$_SESSION['email']?>">
<tr>
<td class="title">Video Url</td>
<td class="field">
<input type="text" name="file" placeholder="Paste video Url Here" /></td>
</tr>
<tr>
<td class="title">Message</td>
<td class="field">
<textarea  name="message" col="12" rows="3"/></textarea></td>
</tr>
<tr>
<td><button type="submit" name="action" value="url">Submit</button></td>
</tr>
</form>
</tbody>

<tbody id="image" style="display: none;">
<form action="insert_image.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="email_id" value="<?=$_SESSION['email']?>">
<tr>
<td class="title">Image:</td>
<td class="field"><input type="file" name="file" size="10" /></td>
</tr>
<tr>
<td class="title">Message</td>
<td class="field"><textarea  name="message" col="12" rows="3" /></textarea></td>
</tr>
<tr>
<td><button type="submit" name="action" value="image">Submit</button></td>
</tr>
</table>
</form>
</tbody>
</center>
</body>
</html>

