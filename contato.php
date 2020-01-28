<!DOCTYPE html>
<html>
	<head>
		<title>Contato</title>
	</head>
	<body>
		<?php include 'HEADER.php'; ?>
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
									<form action="sender.php" method="POST">
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
												<button type="submit"  class="btn btn-primary pull-right" id="btnContactUs" >
												Enviar mensagem</button>
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
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>