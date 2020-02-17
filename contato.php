<?php include 'HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contato</title>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Contato</h1>
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<div id="eventos" class="map-responsive" align="center">
								<iframe align="middle" width="500" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJZXorz9a5qpURo5A4CfmJPTA&key=AIzaSyCuvWK_Fgh2Ki_ljWs940PgnMK0n51AIhg" allowfullscreen></iframe>
							</div>
						</div>
						<div class="col-sm">
							<h3>Informações para contato:</h3>
							<p>Endereço:<br>
								Rua Marechal Floreano, 179<br>
								CEP: 97542-430<br>
								Alegrete - RS<br>
							</p>
							<p>Telefone e Whatsapp:<br>
								<a href="tel:555534227778">+55(55)3422-7778</a>
							</p>
						</div>
					</div>
				</div>
				<hr>
				<div id="form-contato">
					
					<div class="container">
						<div class="text-center">
							<h3 id="msg">Mande uma mensagem para nós</h3>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="well well-sm">
									<form method="POST">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="nome">
													Nome</label>
													<input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva seu nome" required="required" />
												</div>
												<div class="form-group">
													<label for="email">
													Email</label>
													<div class="input-group">
														<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
													</span>
													<input type="email" name="email" class="form-control" id="email" placeholder="Escreva seu email" required="required" /></div>
												</div>
												<div class="form-group">
													<label for="assunto">
													Assunto</label>
													<select id="assunto" name="assunto" class="form-control" required="required">
														<option hidden >Escolha um</option>
														<option value="duvidas">Dúvidas</option>
														<option value="sugestoes">Sugestões</option>
														<option value="reclamacao">Reclamações</option>
														<option value="product">Outros...</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="mensagem">
													Mensagem</label>
													<textarea name="mensagem" id="mensagem" class="form-control" rows="9" cols="25" required="required"
													placeholder="Escreva aqui a sua mensagem"></textarea>
													<br>
												</div>
											</div>
											<div class="col-md-12">
												<button id="myBtn" name="enviarMsg" type="submit" class="btn btn-primary pull-right" id="btnContactUs" >
												Enviar mensagem</button>
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
												$body = $body . "===================================" . "\n\n";
												$body = $body . "Assunto: " . $assunto . "\n\n";
												$body = $body . "Mensagem: " . $mensagem . "\n\n";
												$body = $body . "===================================" . "\n";
												// envia o email
												if( $_SERVER['REQUEST_METHOD'] == 'POST'){
													if(mail($destinatario, $assunto , $body, "From: $email\r\n")){
														echo "<script>Swal.fire(
														'Sucesso!',
														'Sua mensagem foi enviada com sucesso!',
														'success'
														)</script>";
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
											</div>
											<br>
											<br>
											<br>
										</div>
									</form>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<br>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>