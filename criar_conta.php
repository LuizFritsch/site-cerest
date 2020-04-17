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
    	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
		<script type="text/javascript">
			/**
			Funcao que le o json com estados e suas respectivas cidades, e preenche os selects com as opcoes
			*/
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
			
			/**
			Funcao bloquear submit sem preencher todos campos
			*/
			$(document).ready(function() {
			  validate();
			  $('input').on('keyup', validate);
			});

			function validate() {
			  var inputsWithValues = 0;
			  
			  //pega todos inputs exceto o de submit
			  var myInputs = $("input:not([type='submit'])");

			  myInputs.each(function(e) {
			    //se o input tem valor, incrementa o contador
			    if ($(this).val()) {
			      inputsWithValues += 1;
			    }
			  });

			  //se o nmr de inputs preenchidos forem maior ou igual o numero de inputs, desbloqueia o submit
			  if (inputsWithValues >= (myInputs.length)) {
			    $("input[type=submit]").prop("disabled", false);
			  } else {
			    $("input[type=submit]").prop("disabled", true);
			  }
			}


		</script>


		<script type="text/javascript">
			/**
			Validacao dos inputs usando jquery
			*/
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
				        rg:{
				            required: true,
				            minlength: 13,
				            maxlength: 13
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
				        rg:{
				            required: "Seu rg é obrigatório...",
				            minlength: jQuery.format("Seu rg deve conter pelo menos 10 digitos..."),
				            maxlength: jQuery.format("Seu rg deve conter 10 digitos apenas...")
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
					<div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
						<span class="sr-only">0%</span>
					</div>
				</div>
				<small class="form-text text-muted">Este é o seu progresso</small>

				<hr>
				
				<form method="POST" id="input-progress" role="form">
					
					


					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>Nome Completo*</h6>
								<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Digite o seu nome..." required="">
							</div>
							<div class="col-md-6">
								<h6>Celular*</h6>
								<input type="text" pattern="[0-9]*" class="form-control" placeholder="(00) 0 0000-0000" id="celular" name="celular" required="">
							</div>
						</div>
					</div>

					<br>




					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<h6>RG*</h6>
								<input type="text" pattern="[0-9]*"	 class="form-control" placeholder="Digite o seu RG..." id="rg" name="rg" required="">
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
								<div id="disponibilidadeusuario" ></div>
								<script>
									/**
										funcao para verificar se ja existe um usuario igual no bd em tempo real, utilizando ajax
									*/
									$(document).ready(function(){

									    $("#usuario").keyup(function(){

									      var username = $(this).val().trim();

									      if(username != ''){

									         $.ajax({
									            url: './database/verificar_usuario.php',
									            type: 'post',
									            data: {username: username},
									            success: function(response){

									                $('#disponibilidadeusuario').html(response);

									             }
									         });
									      }else{
									         $("#disponibilidadeusuario").html("");
									      }

									    });

									});
								</script>
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
								/**
									Funcao que modifica o progresso da barra de progresso
								*/
								$(document).ready(function(){
									function updateInputProgress(){
										var inputsPreenchidos = 0;
										$("#input-progress").find("input, select, textarea").each(function(){
											if($(this).val() != ""){
												inputsPreenchidos++;
											}
										});
										
										var percentual = Math.ceil(100 * inputsPreenchidos / nmrTotalInputs);
										$("#progress-inputs .progress-bar").attr("aria-valuenow", percentual).width(percentual + "%").find(".sr-only").html(percentual + "% Complete");
										
										return percentual;
									}
									
									//Input Progress
									var nmrTotalInputs = $("#input-progress").find("input, select, textarea").length+1;
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
						<div id="disponibilidadeemail" ></div>
					</div>
					<script>
						/**
							funcao para verificar se ja existe um email igual no bd em tempo real, utilizando ajax
						*/
						$(document).ready(function(){
							$("#email").keyup(function(){
								var email = $(this).val().trim();
								if(email != ''){
									$.ajax({
										url: './database/verificar_email.php',
										type: 'post',
										data: {email: email},
										success: function(response){
											$('#disponibilidadeemail').html(response);
										}
									});
								}else{
									$("#disponibilidadeemail").html("");
								}
							});
						});
					</script>
					<br>					
					<div class="form-group">
						<h6>Local de trabalho</h6>
						<input type="text" class="form-control" id="localTrabalho" name="localTrabalho" placeholder="Digite o seu local de trabalho ou deixe em branco...">
					</div>
					<br>
					<script type="text/javascript">
						/**
							funcao que cria as mascaras dos inputs 
						*/
						$("#telefone, #celular").mask("(99) 99999-9999");
						$("#cpf").mask("999.999.999-99");
						$("#rg").mask("999.999.999-9");
						$('#email').mask("A", {
							translation: {
							"A": { pattern: /[\w@\-.+]/, recursive: true }
							}
						});
					</script>					
					<hr>
					<div class="form-group">
						<div class="form-row">
							<input type="submit" class="btn btn-success btn-lg btn-block btn-lg btn-block" value="Criar Conta"></input>
						</div>
					</div>

					<?php
						try {
								if($_SERVER['REQUEST_METHOD'] == 'POST'){
								if ($_POST['disponibilidadeUsuario']==1 AND $_POST['disponibilidadeEmail']==1) {
									$nomeCompleto=mysqli_real_escape_string($con,$_POST['nomeCompleto']);
									$celular=mysqli_real_escape_string($con,preg_replace('/[^0-9]/', '',$_POST['celular']));
									$cpf=mysqli_real_escape_string($con,preg_replace('/[^0-9]/', '',$_POST['cpf']));
									$rg=mysqli_real_escape_string($con,preg_replace('/[^0-9]/', '',$_POST['rg']));
									$usuario=mysqli_real_escape_string($con,$_POST['usuario']);
									$senha=md5(mysqli_real_escape_string($con,$_POST['senha']));
									$endereco=mysqli_real_escape_string($con,$_POST['endereco']);
									$estado=mysqli_real_escape_string($con,$_POST['estado']);
									$cidade=mysqli_real_escape_string($con,$_POST['cidade']);
									$email=mysqli_real_escape_string($con,$_POST['email']);
									$localTrabalho=mysqli_real_escape_string($con,$_POST['localTrabalho']);
									
									$sql1="SELECT ID FROM estado WHERE NOME LIKE '$estado'";
									$res=mysqli_query($con, $sql1);
									$row=mysqli_fetch_assoc($res);
									$fk_id_estado=$row['ID'];




									$sql2="SELECT ID FROM municipio WHERE NOME LIKE '$cidade'";
									$res2=mysqli_query($con, $sql2);
									$row2=mysqli_fetch_assoc($res2);
									$fk_id_cidade=$row2['ID'];
									$funcao=2;
									$sql3="INSERT INTO usuario_comum(ID,NOME_COMPLETO,ENDERECO,EMAIL,SENHA,FK_ID_ESTADO,FK_ID_MUNICIPIO,LOCAL_TRABALHO,CPF,RG,CELULAR,USUARIO,FK_ID_FUNCAO) VALUES (DEFAULT,'$nomeCompleto','$endereco','$email','$senha','$fk_id_estado','$fk_id_cidade','$localTrabalho','$cpf','$rg','$celular','$usuario','$funcao')";
									


									if ($resultS = mysqli_query($con, $sql3)) {
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
								}elseif($_POST['disponibilidadeUsuario']==0 OR $_POST['disponibilidadeEmail']==0){
									if ($_POST['disponibilidadeUsuario']==0 ) {
										echo "<script>Swal.fire({
											icon: 'error',
										    title: 'Oops, nao foi possivel criar sua conta...',
										    text: 'este usuario ja esta em uso, por favor tente com outro!',
										    });</script>";
									}elseif ($_POST['disponibilidadeEmail']==0) {
										echo "<script>Swal.fire({
											icon: 'error',
										    title: 'Oops, nao foi possivel criar sua conta...',
										    text: 'este email ja esta em uso, por favor tente com outro!',
										    });</script>";
									}
									
								}
								
							}
						} catch (Exception $e) {
							echo "<script>Swal.fire({
											icon: 'error',
										    title: 'Oops, aconteceu algum erro...',
										    text: 'por favor, tente mais tarde!',
										    });</script>";
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