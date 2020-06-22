<?php
	include '../database/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
	}
	$idPaciente= mysqli_real_escape_string($con,$_POST['idPaciente']);
	$status_trabalho= mysqli_real_escape_string($con,$_POST['statsTrabalho']);
	$sql="UPDATE paciente SET STATUS_TRABALHO='$status_trabalho' WHERE ID='$idPaciente'"; 
	mysqli_query($con,$sql);
?> 