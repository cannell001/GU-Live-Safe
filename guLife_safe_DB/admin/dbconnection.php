<?php
 
   $conne=mysql_connect("localhost","root","root");
   if($conne)
   {
   	mysql_select_db('gulivesafe');
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
   