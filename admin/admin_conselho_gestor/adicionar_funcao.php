<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adicionar Função</title>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
	</head>
	<body>
		<?php
			if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
			echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
			echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
			}else{
				$logado = $_SESSION['login'];
				$func = $_SESSION['func'];
				$senh = $_SESSION['senha'];
				$ide = $_SESSION['id'];
			}
			include '../../database/db_connection.php';
			$con=OpenCon();
			$logado = $_SESSION['login'];
			$func = $_SESSION['func'];
			$senh = $_SESSION['senha'];
			$ide = $_SESSION['id'];
		?>
		<main>

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
				    	
				      //validar campos vazios tbm futuramente
				      inputsWithValues += 1;
				    }
				  });

				  if (inputsWithValues >= (myInputs.length)) {
				    $("input[type=submit]").prop("disabled", false);
				  } else {
				    $("input[type=submit]").prop("disabled", true);
				  }
				}


			</script>

			<div class="content text-break">
				<h1 id="t" class="text-center">Adicionar Função e Membro Conselho Gestor</h1>
				<form method="POST">
					<div class="form-group">
						<h6>Digite a Função:</h6>
						<input type="text" class="form-control" name="nomeFuncao" placeholder="Digite o nome da função que será adicionada ao conselho gestor...">
					</div>
					<div class="form-group">
						<h6>Digite o nome do membro para esta função:</h6>
						<input type="text" class="form-control" name="nomeMembro" placeholder="Digite o nome do membro que será adicionado a esta funcao...">
					</div>
					<div class="form-group">
						<hr>
						<input type="submit" class="btn btn-success btn-lg btn-block btn-lg btn-block" value="Criar Conta"></input>
						<hr>
					</div>
				</form>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$nomeFuncao=$_POST['nomeFuncao'];
						$nomeMembro=$_POST['nomeMembro'];
						$sql = "INSERT INTO funcoes_conselho (ID_FUNCAO_CONSELHO,NOME_FUNCAO) VALUES(DEFAULT,'$nomeFuncao');INSERT INTO conselho_gestor (ID_MEMBRO,NOME,FK_ID_FUNCAO) VALUES (DEFAULT,'$nomeMembro', (SELECT ID_FUNCAO_CONSELHO FROM funcoes_conselho WHERE NOME_FUNCAO='$nomeFuncao'))";
						if ($resultS = mysqli_multi_query($con, $sql)) {
							echo "<script>Swal.fire(
									'Sucesso!',
								    'Membro e Função adicionados com sucesso!',
								    'success'
							    ).then(function() {
							        window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php#t';
							        });</script>";
						}else{
							echo "<script>Swal.fire({
								icon: 'error',
							    title: 'Oops...',
							    text: 'Não foi possivel adicionar, tente novamente mais tarde!',
							    }).then(function() {
							    	window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php#t';
							    });</script>";
						}
					}
				?>

			</div>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>