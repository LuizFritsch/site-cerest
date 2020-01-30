<?php
	//require("./PHPMailer/src/Exception.php");
	/*require("./PHPMailer/src/PHPMailer.php");
	require("./PHPMailer/src/SMTP.php");
	$mail= new PHPMailer();
$mail->IsSMTP(); // enable SMTP
	
	$mensagem = htmlspecialchars($_POST['mensagem']);
	$nome = htmlspecialchars($_POST['nome']);
	$email = htmlspecialchars($_POST['email']);
	$assunto = htmlspecialchars($_POST['assunto']);
	
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled

$mail->Host = "smtp.cerestoeste.com.br";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "contato";
$mail->Password = "302050027";
$mail->SetFrom("contato@cerestoeste.com.br");
$mail->Subject = $assunto;
$mail->Body = $mensagem;
$mail->AddAddress($email);
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message has been sent";
echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
}*/
/*
	$nome = htmlspecialchars($_POST['nome']);
	$email = htmlspecialchars($_POST['email']);
	$assunto = htmlspecialchars($_POST['assunto']);
	$mensagem = htmlspecialchars($_POST['mensagem']);
	//$email_to = "oestecerest@gmail.com";
	//$header = 'From: '.$email;
	$corpo = "<html><body>";
		$corpo .= "Nome: $nome ";
		$corpo .= "Email: $email Mensagem: $mensagem";
	$corpo .= "</body></html>";
	$email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));
	$para = 'fritsch@cerestoeste.com.br';*/
	
	/*$mail = new PHPMailer();
	$mail->IsSMTP(); // envia por SMTP
	$mail->CharSet = 'UTF-8';
	$mail->True;
	$mail->Host = "smtp.cerestoeste.com.br"; // Servidor SMTP
	$mail->Port = 25;
	$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	$mail->Username = "contato@seudominio.com.br"; // SMTP username
	$mail->Password = "302050027"; // SMTP password
	$mail->From = "contato@seudominio.com.br"; // From
	$mail->FromName = $nome; // Nome de quem envia o email
	$mail->AddAddress($destino, $nome); // Email e nome de quem receberá //Responder
	$mail->WordWrap = 50; // Definir quebra de linha
	$mail->IsHTML = true ; // Enviar como HTML
	$mail->Subject = $assunto ; // Assunto
	$mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
	$mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML
	if(!$mail->Send()) {
		echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
		echo "Erro no envio da mensagem";
	}*//*
	if (!empty($nome) && !empty($email) && !empty($mensagem)) {
		//echo $para. '<br>' .$assunto. '<br>' .$corpo. '<br>' .$email_headers;
	if (mail($para, $assunto, $corpo, $email_headers)) {
		$msg = "Sua mensagem foi enviada com sucesso.";
echo "<script>alert('$msg');window.location.replace('http://guilherme.cerestoeste.com.br/contato.php#msg');</script>";
}

//echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
} else {
$msg = "Erro ao enviar a mensagem.";
echo "<script>alert('$msg');window.location.replace('http://guilherme.cerestoeste.com.br/contato.php#msg');</script>";
}
*/
# alterar a variavel abaixo colocando o seu email
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
	$msg = "Sua mensagem foi enviada com sucesso.";	echo "<script>alert('$msg');window.location.replace('http://guilherme.cerestoeste.com.br/contato.php#msg');</script>";

	header("location:http://guilherme.cerestoeste.com.br/contato.php#msg");
}else{
	$msg = "Erro ao enviar a mensagem.";
	echo "<script>alert('$msg');window.location.replace('http://192.168.7.41/cerest/contato.php#msg');</script>";
}
// redireciona para a página de obrigado
?>