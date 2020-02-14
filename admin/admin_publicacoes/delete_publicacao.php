<?php
if(isset($_GET['user-id'])){
	include '../../sinan/db_connection.php';
	$con=OpenCon();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id=$_GET['id'];
	$sql="DELETE FROM publicacoes WHERE ID_PUBLICACAO='$id'"; 
	echo "<script>alert($sql);</script>";
	mysqli_query($con,$sql);
	echo "<script>window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php#tabela-publicacoes';</script>";				

}else{
	echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
	echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/gerenciar_publicacoes.php');</script>";
}
?> 