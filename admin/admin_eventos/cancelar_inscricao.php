<?php
	include '../../database/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id=$_POST['id'];
	$idEvento=$_POST['idEvento'];
	$sql="DELETE FROM inscritos_eventos WHERE FK_ID_USUARIO='$id' AND FK_ID_EVENTO='$idEvento'";
	$ip=$sql;
	$file = fopen("SQL.txt","a");
	fwrite($file,$ip);
	fclose($file);
			
	mysqli_query($con,$sql);
?> 