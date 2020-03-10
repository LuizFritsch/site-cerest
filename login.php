<?php include 'HEADER.php'; ?>
<?php
	if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
		echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/relatorio_nucleos.php#msg');</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Efetue Login</title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Login</h1>
				<div class="content text-break">
					<div class="container">
						
						<div class="row">
							<div class="col-sm">
								<div id="eventos" >
									<form method="post" action="./database/log_in.php" id="formlogin" name="formlogin" >
										<fieldset>
											<legend>Já é cadastrado?</legend>
											<div class="dividosa" id="dividosa">
												<div class="form-group">
													<label for="inputUsuario">Usuário</label>
													<input type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Digite o seu nome de Usuário..." autofocus>
													<script>
														$('#inputUsuario').focus();
														document.getElementById('inputUsuario').scrollIntoView();
													</script>
												</div>
												<div class="form-group">
													<label for="inputSenha">Senha</label>
													<input type="password" class="form-control" name="inputSenha" id="inputSenha" placeholder="Digite a sua senha...">
												</div>
												<input type="submit" class="form-group btn btn-primary btn-lg btn-block" value="Entrar"  />
											</div>
										</fieldset>
									</form>
								</div>
							</div>
							<div class="col-sm">
								<h4 id="t" class="text-justify">Não é cadastrado ainda?</h4>
								<p class="text-justify">Caso você não esteja cadastrado no nosso sistema ainda, solicite seu usuário e senha.</p>
								
								<button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#ExemploModalCentralizado">Solicitar Acesso</button>
								<!-- Modal -->
								<div class="modal fade bd-example-modal-lg" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="modal-lg" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modal-lg">Solicitar Acesso</h5>
												<button type="button" class="close" data-dismiss="modal-lg" aria-label="Fechar">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body modal-dialog modal-lg" style="pointer-events: all;">
												<div class="modal-body modal-dialog mmodal-lg" style="pointer-events: all;">
													
													<div class="row text-center">
														
														<div class="col-md-6">
															<div class="card m-3 border shadow-sm">
																<div class="card-body">
																	<h5 class="card-title">Sou representante de Núcleo</h5>
																	<hr>
																	<p class="card-text text-center">Esta opção é para pessoas que fazem parte dos núcleos em saúde do trabalhador.</p>
																	<p class="card-text text-center">Será solicitado informações relacionadas a você, ao secretário de saúde e do presidente do conselho municipal de saúde do seu municipio.</p>
																	<p class="card-text text-center"><strong>*Caso opte por esta opção, sua solicitação será avaliada antes de liberarmos seu acesso.</strong></p>
																	<a type="button" class="btn btn-success" href="https://guilherme.cerestoeste.com.br/criar_conta.php#t">Solicitar</a>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="card m-3 border shadow-sm">
																<div class="card-body">
																	<h5 class="card-title">Sou um usuário Comum</h5>
																	<hr>
																	<p class="card-text text-center">Esta opção é para quem apenas deseja se cadastrar em eventos, para receber emails sobre, ou realizar comentários nas páginas de noticia.</p>
																	<a type="button" class="btn btn-success" href="https://guilherme.cerestoeste.com.br/criar_conta.php#t">Solicitar</a>
																</div>
															</div>
														</div>
														
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					<br>
				</div>
			</main>
			<?php include 'footer.html'; ?>
		</body>
	</html>