<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Show/Hide</title>
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
<table width="340" cellspacing="0" cellpadding="2">
<thead>
<tr>
<td class="title">Type:</td>
<td class="field">
<select name="type" onchange="display(this,'text','image');">
<option>Select Type Report an Incident:</option>
<option value="image">Image</option>
<option value="text">Text</option>
</select>
</td>
</tr>
</thead>
<tbody id="text" style="display: none;">
<tr>
<td class="title">Video Url </td>
<td class="field">
<input type="text" name="file" size="8" maxlength="7" /></td>
</tr>
<tr>
<td class="title">Message</td>
<td class="field">
<textarea  name="message" col="12" rows="3"/></textarea></td>
</tr>
</tbody>
<tbody id="image" style="display: none;">
<tr>
<td class="title">Image:</td>
<td class="field"><input type="file" name="image" size="10" /></td>
</tr>
<tr>
<td class="title">Message</td>
<td class="field"><textarea  name="message" col="12" rows="3" /></textarea></td>
</tr>
</tbody>

</table>
</body>
<button type="submit" name="">Submit</button> 
</html>