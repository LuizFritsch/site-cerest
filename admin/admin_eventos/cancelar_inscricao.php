<?php
	include '../../database/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id= mysqli_real_escape_string($con,$_POST['id']);
	$idEvento= mysqli_real_escape_string($con,$_POST['idEvento']);
	$sql="DELETE FROM inscritos_eventos WHERE FK_ID_USUARIO='$id' AND FK_ID_EVENTO='$idEvento'";			
	mysqli_query($con,$sql);
?> 