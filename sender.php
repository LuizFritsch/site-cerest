<?php

$destinatario = "contato@cerestoeste.com.br";
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$mensagem = $_REQUEST['mensagem'];
$assunto = $_REQUEST['assunto'];
// monta o e-mail na variavel $body
$body = "===================================" . "\n";
$body = $body . "FALE CONOSCO - CONTATO SITE" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Nome: " . $nome . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Mensagem: " . $mensagem . "\n\n";
$body = $body . "===================================" . "\n";
// envia o email
if(mail($destinatario, $assunto , $body, "From: $email\r\n")){
	$msg = "Sua mensagem foi enviada com sucesso.";	echo "<script>alert('$msg');window.location.replace('https://guilherme.cerestoeste.com.br/contato.php#msg');</script>";

	header("location:https://guilherme.cerestoeste.com.br/contato.php#msg");
}else{
	$msg = "Erro ao enviar a mensagem.";
	echo "<script>alert('$msg');window.location.replace('https://guilherme.cerestoeste.com.br/cerest/contato.php#msg');</script>";
}
// redireciona para a página de obrigado
?>