<?php
	include '../../database/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$idEvento= mysqli_real_escape_string($con,$_POST['idEvento']);
	$sql="DELETE FROM inscritos_eventos WHERE FK_ID_EVENTO='$idEvento'";
	$sql2="DELETE FROM eventos WHERE ID='$idEvento'";			
	mysqli_query($con,$sql);
	mysqli_query($con,$sql2);
?> 