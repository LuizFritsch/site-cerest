<?php
	include './db_connection.php';
	$con=OpenCon();
	
	$nomeEvento=mysqli_real_escape_string($con,$_POST['nomeEvento']);
	$descricaoEvento=mysqli_real_escape_string($con,$_POST['descricaoEvento']);
	$dataInicio=mysqli_real_escape_string($con,$_POST['dataInicio']);
	$dataFim=mysqli_real_escape_string($con,$_POST['dataFim']);
	$nmrVagas=mysqli_real_escape_string($con,$_POST['nmrVagas']);

	$statusInscricao=1;
	
	$sql="INSERT INTO eventos(ID,NOME,DESCRICAO,DATA_INICIO,DATA_FIM,NMR_MAX_PARTICIPANTES,STATUS_INSCRICOES) VALUES(DEFAULT,'$nomeEvento','$descricaoEvento',STR_TO_DATE( '$dataInicio', '%d/%m/%Y' ),STR_TO_DATE( '$dataFim', '%d/%m/%Y' ),'$nmrVagas','$statusInscricao')";

	if (mysqli_query($con,$sql)) {
		return TRUE;
	}else{
		die();
	}
?>