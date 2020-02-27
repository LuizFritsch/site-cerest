<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "vinilpub_guilher";
 $dbpass = "302050027";
 $db = "vinilpub_guilherme_cerest";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 mysqli_set_charset($conn, "utf8");
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
