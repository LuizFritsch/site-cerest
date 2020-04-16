<?php
	include './db_connection.php';
	$con=OpenCon();
	
	$nomeEvento=mysqli_real_escape_string($con,$_POST['nomeEvento']);
	$descricaoEvento=mysqli_real_escape_string($con,$_POST['descricaoEvento']);
	$dataInicio=mysqli_real_escape_string($con,$_POST['dataInicio']);
	$dataFim=mysqli_real_escape_string($con,$_POST['dataFim']);

	$statusInscricao=1;
	
	$sql="INSERT INTO eventos(ID,NOME,DESCRICAO,DATA_INICIO,DATA_FIM,STATUS_INSCRICOES) VALUES(DEFAULT,'$nomeEvento','$descricaoEvento',STR_TO_DATE( '$dataInicio', '%d/%m/%Y' ),STR_TO_DATE( '$dataFim', '%d/%m/%Y' ),'$statusInscricao')";

	if (mysqli_query($con,$sql)) {
		return TRUE;
	}else{
		die();
	}
?>