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
												if(isset($_POST['enviarMsg'])){
													if(mail($destinatario, $assunto , $body, "From: $email\r\n")){
echo "<script>Swal.fire('Sucesso!','Sua msg foi enviada para gente!','success')</script>";
echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/contato.php#msg');</script>";
}else{
echo "<script>Swal.fire({
icon: 'Erro',
title: 'Oops...',
text: 'Não foi possivel enviar sua mensagem, tente novamente!',
})</script>";
echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/cerest/o_cerest.php#t');</script>";
}
}

// redireciona para a página de obrigado
?>