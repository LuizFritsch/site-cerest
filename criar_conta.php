<?php include 'HEADER.php'; ?>
<?php
	if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
		echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
	}
	include './database/db_connection.php';
	$con=OpenCon();
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
				$("#input-progress").validate({
				    rules:{
				        nomeCompleto:  {
				            required: true,
				            minlength: 4
				        },
				        celular:{
				            required: true,
				            minlength: 11,
				            maxlength: 15
				        },
				        cpf:{
				            required: true,
				            minlength: 11,
				            maxlength: 15
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
				            required: true,
				            email:true
				        }
				    },
				    messages: {
				        nomeCompleto:{
				            required: "Seu nome é obrigatório...",
				            minlength: jQuery.format("Seu nome deve conter pelo menos {0} caracteres...")
				        },
				       	celular:{
				            required: "Seu nmr. de celular é obrigatório...",
				            minlength: jQuery.format("Seu celular deve conter pelo menos {0} digitos..."),
				            maxlength: jQuery.format("Seu celular deve conter menos que {0} digitos...")
				        },
				        cpf:{
				            required: "Seu cpf é obrigatório...",
				            minlength: jQuery.format("Seu cpf deve conter pelo menos {0} digitos..."),
				            maxlength: jQuery.format("Seu cpf deve conter menos que {0} digitos...")
				        },
				        usuario:{
				            required: "Você precisa criar um usuário..."
				        },
				        senha:{
				            required: "Você precisa criar uma senha..."
				        },
				        endereco:{
				            required: "Seu endereço é obrigatório..."
				        },
				        estado:{
				            required: "Por favor, selecione um estado..."
				        },
				        cidade:{
				            required: "Por favor, selecione uma cidade..."
				        },
				        email:{
				            required: "Seu email é obrigatório...",
				            email:"Por favor, digite um email válido..."
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
				<h1 id="t" class="text-center">Criar contra</h1>
				<div id="progress-inputs" class="progress">
					<div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-vluemax="100" style="width:0%;">
						<span class="sr-only">0%</span>
					</div>
				</div>
				<small class="form-text text-muted">Este é o seu progresso</small>

				<hr>
				
				<form method="POST" id="input-progress" role="form">
					
					<div class="form-group">
						<h6>Nome Completo*</h6>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Digite o seu nome..." required="">
					</div>
					<br>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>Celular*</h6>
								<input type="text" pattern="[0-9]*" class="form-control" placeholder="(00) 0 0000-0000" id="celular" name="celular" required="">
							</div>
							<div class="col-md-6">
								<h6>CPF*</h6>
								<input type="text" pattern="[0-9]*"	 class="form-control" placeholder="000.000.000-00" id="cpf" name="cpf" required="">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>Nome de Usuário*</h6>
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite o seu nome de Usuário..." required="">
							</div>
							<div class="col-md-6">
								<h6 data-toggle="tooltip" data-placement="top" title="Sua senha deve conter pelo menos: 1 caracter minusculo, 1 caracter maiusculo e 1 caracter especial...">Senha*</h6>
								<input type="password" class="form-control" id="senha" name="senha"  placeholder="Digite sua senha..." required="">
								<small id="emailHelp" class="form-text text-muted">Sua senha deve conter pelo menos: 1 caracter minusculo, 1 caracter maiusculo e tamanho maior que 6 digitos...</small>
							</div>
							<script type="text/javascript">
								$("input[pattern]").blur(function(){
								  var elem = $(this);	 
								  var pattern = new RegExp(elem.attr("pattern"));
								})
							</script>
							<script type="text/javascript">
								$(document).ready(function(){
									function updateInputProgress(){
										var filledFields = 0;
										$("#input-progress").find("input, select, textarea").each(function(){
											if($(this).val() != ""){
												filledFields++;
											}
										});
										
										var percent = Math.ceil(100 * filledFields / totalFields);
										$("#progress-inputs .progress-bar").attr("aria-valuenow", percent).width(percent + "%").find(".sr-only").html(percent + "% Complete");
										
										return percent;
									}
									
									//Input Progress
									var totalFields = $("#input-progress").find("input, select, textarea").length-1;
									$("#input-progress").click(function(){
										updateInputProgress();
									});
									
								});
							</script>
						</div>
					</div>
					<br>
					<div class="form-group">
						<h6>Endereço*</h6>
						<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o seu endereço..." required="">
					</div>
					<br>
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
					<br>
					<div class="form-group">
						<h6>Email*</h6>
						<input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email..." required="">
					</div>
					<br>					
					<div class="form-group">
						<h6>Local de trabalho</h6>
						<input type="text" class="form-control" id="localTrabalho" name="localTrabalho" placeholder="Digite o seu local de trabalho ou deixe em branco...">
					</div>
					<br>
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

					<?php
						
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$nomeCompleto=$_POST['nomeCompleto'];
							$celular=preg_replace('/[^0-9]/', '',$_POST['celular']);
							$cpf=preg_replace('/[^0-9]/', '',$_POST['cpf']);
							$usuario=$_POST['usuario'];
							$senha=md5($_POST['senha']);
							$endereco=$_POST['endereco'];
							$estado=$_POST['estado'];
							$cidade=$_POST['cidade'];
							$email=$_POST['email'];
							$localTrabalho=$_POST['localTrabalho'];
							$sql1="SELECT ID_ESTADO FROM estados WHERE NOME_ESTADO LIKE $estado";
							$res=mysqli_query($con, $sql1);
							$fk_id_estado= mysqli_fetch_assoc($res);
							$sql2="SELECT ID_CIDADE FROM cidades WHERE NOME_CIDADE LIKE $cidade";
							$fk_id_cidade= mysqli_fetch_assoc($resu=mysqli_query($con, $sql2));
							$sql3="INSERT INTO usuario_comum(ID_USUARIO,NOME_COMPLETO,ENDERECO,EMAIL,SENHA,FK_ID_ESTADO,FK_ID_MUNICIPIO,LOCAL_TRABALHO,CPF,RG,CELULAR) VALUES (DEFAULT,$nomeCompleto,$endereco,$email,$senha,$fk_id_estado,$fk_id_cidade,$localTrabalho,$cpf,$rg,$celular)";
							echo "$sql3";
							$resultS = mysqli_query($con, $sql3);
							if($resultS === FALSE) { 
							   die(mysqli_error());
							}
							if ($resultS) {
								echo "<script>Swal.fire(
										'Sucesso!',
									    'Seu usuário foi criado com sucesso!',
									    'success'
								    ).then(function() {
								        window.location = 'https://guilherme.cerestoeste.com.br/login.php#t';
								        });</script>";
							}else{
								echo "<script>Swal.fire({
									icon: 'error',
								    title: 'Oops...',
								    text: 'Não foi possivel criar um usuário, tente novamente mais tarde!',
								    }).then(function() {
								    	window.location = 'https://guilherme.cerestoeste.com.br/login.php#t';
								    });</script>";
							}
						}
					?>

					<br>
					<hr>
				</form>
				<br>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>