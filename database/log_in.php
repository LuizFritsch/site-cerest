<?php
// session_start inicia a sessão
include 'db_connection.php';
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login=$_POST['inputUsuario'];
$senha=$_POST['inputSenha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$con = OpenCon();
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios
$result=mysqli_query($con,"SELECT * FROM usuarios WHERE NOME = '$login' AND SENHA= '$senha'");
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página site.php ou retornara  para a página
do formulário inicial para que se possa tentar novamente realizar o login */
$senhaHash=md5($senha);
$results=mysqli_query($con,"SELECT * FROM usuario_comum WHERE USUARIO = '$login' AND SENHA= '$senhaHash'");
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_array($result)) {
		$_SESSION['login']=$row["NOME"];
		$_SESSION['senha']=$row["SENHA"];
		$_SESSION['func']=$row["ID_USUARIO"];
		$_SESSION['id']=$row["FK_ID_FUNCAO"];
	}
	if ($_SESSION['id']==1) {
		header('location:https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t');
	}elseif ($_SESSION['id']==2) {
		header('location:https://guilherme.cerestoeste.com.br/index.php#t');
	}elseif ($_SESSION['id']==3) {
		header('location:https://guilherme.cerestoeste.com.br/relatorio_nucleos.php#t');
	}else{
		header('location:https://guilherme.cerestoeste.com.br/');
	}
}elseif (mysqli_num_rows($results)>0) {
	while($row = mysqli_fetch_array($results)) {
		$_SESSION['login']=$row["USUARIO"];
		$_SESSION['senha']=$row["SENHA"];
		$_SESSION['func']=$row["ID"];
		$_SESSION['id']=$row["FK_ID_FUNCAO"];
	}
	if ($_SESSION['id']==1) {
		header('location:https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t');
	}elseif ($_SESSION['id']==2) {
		header('location:https://guilherme.cerestoeste.com.br/index.php#t');
	}else{
		header('location:https://guilherme.cerestoeste.com.br/');
	}
	exit;
}
else{
	header('location:https://guilherme.cerestoeste.com.br/login.php');
	exit;
}
/**
 Transformar tabela usuario comum em usuario, ai cada tabela especifica (usuario_comum,usuario_nucleo,admin) tera uma fk desta tabela, ai aqui no login bastara um select em uma tabela
**/
?>



