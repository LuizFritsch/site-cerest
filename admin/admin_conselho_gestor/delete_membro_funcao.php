<?php
if(isset($_GET['user-id'])){
	include '../../database/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id=$_GET['id'];
	$fk=$_GET['fkmembro'];
	$sql="DELETE FROM conselho_gestor WHERE ID_MEMBRO='$id'"; 
	$sql2="DELETE FROM funcoes_conselho WHERE ID_FUNCAO_CONSELHO='$fk'";
	if (mysqli_query($con,$sql)) {
	 	if (mysqli_query($con,$sql2)) {
	 		echo "<script>window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php#t';</script>";
	 	}
	 }				
}else{
	echo "<script>imap_alerts()t('Você não está logado ou não tem o nível de acesso necessário!')</script>";
	echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
}
?> 