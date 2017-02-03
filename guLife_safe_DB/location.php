<?php
//http://localhost/guLife_safe/location.php
include "dbconnection.php";
$qry="SELECT * FROM locations  ORDER BY loction_name ASC";
$res=mysql_query($qry);
$var=array();
while($result=mysql_fetch_assoc($res)){
 array_push($var, $result['loction_name']);
}
echo json_encode($var);
?>