<?php include 'HEADER.php'; ?>
<?php
	if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
		echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$.getJSON('estados_cidades.json', function (data) {
					var items = [];
					var options = '<option value="">escolha um estado</option>';
					$.each(data, function (key, val) {
						options += '<option value="' + val.nome + '">' + val.nome + '</option>';
					});
					$("#estados").html(options);
					$("#estados").change(function () {
						var options_cidades = '';
						var str = "";
						$("#estados option:selected").each(function () {
							str += $(this).text();
						});
						$.each(data, function (key, val) {
							if(val.nome == str) {
								$.each(val.cidades, function (key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});
							}
						});
						$("#cidades").html(options_cidades);
						
							}).change();
				});
			});
		</script>
		<title>Criar conta</title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Criar contra</h1>
				
				<form method="POST">
					
					<div class="form-group">
						<h6>Nome Completo</h6>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Digite o seu nome..." required="">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<h6>Celular</h6>
							<input type="text" class="form-control" placeholder="(00) 0 0000-0000" id="celular" name="celular" required="">
						</div>
						<div class="form-group col-md-6">
							<h6>CPF</h6>
							<input type="text" class="form-control" placeholder="000.000.000-00" id="cpf" name="cpf" required="">
						</div>
					</div>
					<div class="form-group">
						<h6>Nome de Usuário</h6>
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite o seu nome de Usuário..." required="">
					</div>
					<div class="form-group">
						<h6>Endereço</h6>
						<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o seu endereço..." required="">
					</div>

					<div class="form-row">
						<div class="col-md-6">
							<h6>Estado</h6>
							<select class="form-control" id="estados" required="">
								<option value=""></option>
							</select>
						</div>
						<div class="col-md-6">
							<h6>Municipio</h6>
							<select class="form-control" id="cidades" required="">
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<h6>Email</h6>
						<input type="text" class="form-control" id="email" name="inputNome" placeholder="Digite o seu nome..." required="">
					</div>
					
					
					<div class="form-group">
						<h6>Local de trabalho</h6>
						<input type="text" class="form-control" id="localTrabalho" name="inputLocalTrabalho" placeholder="Digite o seu local de trabalho ou deixe em branco...">
					</div>
					
					<script type="text/javascript">
						$("#telefone, #celular").mask("(00) 00000-0000");
						$("#cpf").mask("000.000.000-00");
						$('#email').mask("A", {
							translation: {
							"A": { pattern: /[\w@\-.+]/, recursive: true }
							}
						});
					</script>
					
				</form>
				<br>
				<hr>
				<div class="form-row">
					<button type="submit" class="btn btn-success btn-lg btn-block btn-lg btn-block">Criar Conta</button>
				</div>
				<hr>
				<br>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>