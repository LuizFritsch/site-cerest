<?php
function OpenCon(){
	$dbhost = "localhost";
	$dbuser = "vinilpub_guilher";
	$dbpass = "302050027";
	$db = "vinilpub_guilherme_cerest";
	$conn = mysqli_connect("localhost","vinilpub_guilher", "302050027","vinilpub_guilherme_cerest") or die("Sem conexão com o servidor");
	return $conn;
 }
 
function CloseCon($conn){
	$conn -> close();
}
   
