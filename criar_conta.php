<?php include 'HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<title>Criar conta</title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Criar contra</h1>
				
				<form></form>

				<div class="form-row">
					
					<div class="form-group col-md-6">
						<h6>Nome</h6>
						<input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Digite o seu nome..." required="">
					</div>
					
					<div class="form-group col-md-6">
						<h6>Sobrenome</h6>
						<input type="text" class="form-control" id="inputSobrenome" name="inputSobrenome" placeholder="Digite o seu sobrenome..." required="">
					</div>
					
					<h6>Celular</h6>
					<input type="text" class="form-control" placeholder="Celular" id="celular" name="celular" required=""><br>
					
					<h6>CPF</h6>
					<input type="text" class="form-control" placeholder="Digite seu cpf..." id="cpf" name="cpf" required=""><br>
					
					<script type="text/javascript">
						$("#telefone, #celular").mask("(00) 0000-0000");
						$("#cpf").mask("000.000.000-00");
					</script>

					<br>

				</div>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>