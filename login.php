<?php
try {
	session_start();
} catch (Exception $e) {
	echo "fudeo";
}
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
		<?php include 'HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Login</h1>
				<div class="content text-break">
					<div class="container">
						<div class="row">
							<div class="col-sm">
								<div id="eventos" >
									<form method="post" action="./sinan/ope.php" id="formlogin" name="formlogin" >
										<fieldset>
											<legend>Já é cadastrado?</legend>
											<div class="dividosa" id="dividosa">
												<div class="form-group">
													<label for="inputUsuario">Usuário</label>
													<input type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Digite o seu nome de Usuário...">
												</div>
												<div class="form-group">
													<label for="inputSenha">Senha</label>
													<input type="password" class="form-control" name="inputSenha" id="inputSenha" placeholder="Digite a sua senha...">
												</div>
												<input type="submit" class="form-group btn btn-primary" value="Entrar"  />
											</div>
										</fieldset>
									</form>
								</div>
							</div>
							<div class="col-sm">
								<h4 id="t" class="text-justify">Não é cadastrado ainda?</h4>
								<p class="text-justify">Caso você não esteja cadastrado no nosso sistema ainda, solicite seu usuário e senha.</p>
								<form method="POST" action="solicitar_usuario.php">
									<button class="btn btn-success">Solicitar Acesso</button>
								</form>
							</div>
						</div>
					</div>
					
					<br>
				</div>
			</main>
			<?php include 'footer.html'; ?>
		</body>
	</html>