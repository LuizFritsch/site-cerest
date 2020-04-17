<?php
	include './db_connection.php';
	$con=OpenCon();
	
	$idEvento=mysqli_real_escape_string($con,$_POST['idEvento']);
	$nomeEvento=mysqli_real_escape_string($con,$_POST['nomeEvento']);
	$descricaoEvento=mysqli_real_escape_string($con,$_POST['descricaoEvento']);
	$dataInicio=mysqli_real_escape_string($con,$_POST['dataInicio']);
	$dataFim=mysqli_real_escape_string($con,$_POST['dataFim']);

	$statusInscricao=1;
	
	$sql="UPDATE eventos SET NOME='$nomeEvento', DESCRICAO='$descricaoEvento', DATA_INICIO=STR_TO_DATE( '$dataInicio', '%d/%m/%Y' ), DATA_FIM=STR_TO_DATE( '$dataFim', '%d/%m/%Y' ) WHERE ID='$idEvento'";

	if (mysqli_query($con,$sql)) {
		return TRUE;
	}else{
		die();
	}
?>