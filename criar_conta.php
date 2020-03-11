<?php include 'HEADER.php'; ?>
<?php
	if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$.getJSON('estados_cidades.json', function (data) {
					var items = [];
					var options = '<option value="">escolha um estado</option>';
					$.each(data, function (key, val) {
						options += '<option value="' + val.nome + '">' + val.nome + '</option>';
					});
					$("#estado").html(options);
					$("#estado").change(function () {
						var options_cidades = '';
						var str = "";
						$("#estado option:selected").each(function () {
							str += $(this).text();
						});
						$.each(data, function (key, val) {
							if(val.nome == str) {
								$.each(val.cidades, function (key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});
							}
						});
						$("#cidade").html(options_cidades);
						
							}).change();
				});
			});
		</script>


		<script type="text/javascript">
			
			//Funcao bloquear submit sem preencher (todos campos - 1)
			$(document).ready(function() {
			  validate();
			  $('input').on('keyup', validate);
			});

			function validate() {
			  var inputsWithValues = 0;
			  
			  // get all input fields except for type='submit'
			  var myInputs = $("input:not([type='submit'])");

			  myInputs.each(function(e) {
			    // if it has a value, increment the counter
			    if ($(this).val()) {
			      inputsWithValues += 1;
			    }
			  });

			  if (inputsWithValues >= (myInputs.length-1)) {
			    $("input[type=submit]").prop("disabled", false);
			  } else {
			    $("input[type=submit]").prop("disabled", true);
			  }
			}


		</script>


		<script type="text/javascript">
			$(document).ready(function () {
				$("#form").validate({
				    rules:{
				        nomeCompleto:  {
				            required: true,
				            minlength: 4
				        },
				        celular:{
				            required: true,
				            digits: true,
				            minlength: 11,
				            maxlength: 11
				        },
				        cpf:{
				            required: true,
				            digits: true,
				            minlength: 11,
				            maxlength: 11
				        },
				        usuario:{
				            required: true
				        },
				        senha:{
				            required: true
				        },
				        endereco:{
				            required: true
				        },
				        estado:{
				            required: true
				        },
				        cidade:{
				            required: true
				        },
				        email:{
				            required: true
				        },
				        localTrabalho:{
				            required: true
				        }
				    },
				    messages: {
				        nomeCompleto:{
				            required: "Seu nome é obrigatório...",
				            minlength:  jQuery.format("Seu nome deve conter pelo menos {0} caracteres...")
				        },
				       	Celular:{
				            required: "Seu nmr. de celular é obrigatório...",
				            digits: "Esse campo só aceita números...",
				            minlength: jQuery.format("Seu celular deve conter pelo menos {0} digitos...")
				        },
				        cpf:{
				            required: "Seu cpf é obrigatório...",
				            digits: "Esse campo só aceita números...",
				            minlength: jQuery.format("Seu cpf deve conter pelo menos {0} digitos...")
				        },
				        usuario:{
				            required: "Seu nome é obrigatório..."
				        },
				        senha:{
				            required: "Seu nome é obrigatório..."
				        },
				        endereco:{
				            required: "Seu nome é obrigatório..."
				        },
				        estado:{
				            required: "Seu nome é obrigatório..."
				        },
				        cidade:{
				            required: "Seu nome é obrigatório..."
				        },
				        email:{
				            required: "Seu nome é obrigatório..."
				        },
				        localTrabalho:{
				            required: "Seu nome é obrigatório..."
				        }
				    }
				});
			});
		</script>
		<title>Criar conta</title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Criar contra</h1>
				
				<form method="POST" id="form" action="">
					
					<div class="form-group">
						<h6>Nome Completo*</h6>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Digite o seu nome..." required="">
					</div>
					
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>Celular*</h6>
								<input type="text" class="form-control" placeholder="(00) 0 0000-0000" id="celular" name="celular" required="" maxlength="11" >
							</div>
							<div class="col-md-6">
								<h6>CPF*</h6>
								<input type="text" class="form-control" placeholder="000.000.000-00" id="cpf" name="cpf" required="" maxlength="11" >
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>Nome de Usuário*</h6>
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite o seu nome de Usuário..." required="">
							</div>
							<div class="col-md-6">
								<h6>Senha*</h6>
								<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha..." required="" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<h6>Endereço*</h6>
						<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o seu endereço..." required="">
					</div>
					
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>Estado*</h6>
								<select class="form-control" id="estado" name="estado" required="">
									<option value=""></option>
								</select>
							</div>
							<div class="col-md-6">
								<h6>Municipio*</h6>
								<select class="form-control" id="cidade" name="cidade" required="">
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<h6>Email*</h6>
						<input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email..." required="">
					</div>
					
					
					<div class="form-group">
						<h6>Local de trabalho</h6>
						<input type="text" class="form-control" id="localTrabalho" name="localTrabalho" placeholder="Digite o seu local de trabalho ou deixe em branco...">
					</div>
					
					<script type="text/javascript">
						$("#telefone, #celular").mask("(99) 99999-9999");
						$("#cpf").mask("999.999.999-99");
						$('#email').mask("A", {
							translation: {
							"A": { pattern: /[\w@\-.+]/, recursive: true }
							}
						});
					</script>
					<script type="text/javascript">
						/*$(document).ready(function () {
							$('#nomeCompleto').blur(function(){
							    if($('#nomeCompleto').val().length < 6 || $('#nomeCompleto').val().length > 400)
							    {
							        alert('Nome de usuário deve ter entre 6 e 400 caracteres');
							    }
							});
						});*/
					</script>
					
					<hr>
					<div class="form-group">
						<div class="form-row">
							<input type="submit" class="btn btn-success btn-lg btn-block btn-lg btn-block" value="Criar Conta"></input>
						</div>
					</div>
					<hr>
				</form>
				<br>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>