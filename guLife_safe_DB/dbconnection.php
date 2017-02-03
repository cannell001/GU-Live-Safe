<?php
 
   $conne=mysql_connect("localhost","gulivesa_gulive","gulivesafe123");
   if($conne)
   {
   	mysql_select_db('gulivesa_gulivesafe');
   }
   else
   {
   	echo "db not connected";
   } 


/*
   $conne=mysql_connect("localhost","smartmin_gym","gym@123");
   if($conne)
   {
   	mysql_select_db('smartmin_gym');
   }
   else
   {
   	echo "db not connected";
   }  */
   
   ?>
   