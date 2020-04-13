<?php
	include '../../database/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
	}
	$idEvento= mysqli_real_escape_string($con,$_POST['idEvento']);
	$status_inscricoes= mysqli_real_escape_string($con,$_POST['statusInscricoes']);
	$sql="UPDATE eventos SET STATUS_INSCRICOES='$status_inscricoes' WHERE ID='$idEvento'"; 
	mysqli_query($con,$sql);
?> 