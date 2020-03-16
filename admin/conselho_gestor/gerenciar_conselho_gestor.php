<?php include '../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<title>Painel Admin Conselho Gestor</title>
	</head>
	<body>
		<?php
			if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
				echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
				echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
			}
			include '../database/db_connection.php';
			$con=OpenCon();
			$logado = $_SESSION['login'];
			$func = $_SESSION['func'];
			$senh = $_SESSION['senha'];
			$ide = $_SESSION['id'];
		?>
		<main>
			<div class="content text-break">
				<?php
				echo "<h1 id='t' class='text-justify'>Painel de controle</h1>";
				echo "";
				?>
				<!-- Editable table -->
				<form method="POST" >
					<div class="card">
						<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Conselho gestor do CEREST</h3>
						<div class="card-body">
							<div id="table" class="table-editable">
								<table class="table d-flex table-bordered text-center table-hover-cells">
									<thead>
										<tr>
											<?php
												//Seleciona todas as funcoes do conselho gestor que estao do banco
												$arrayFuncoes = array();
												$sql="SELECT * FROM funcoes_conselho";
												$result=mysqli_query($con,$sql);
												if(!$result ) {
													die('Could not get data: ' . mysql_error());
												}
												//Envia o html contendo o nome das funcoes para um array
												while($row = mysqli_fetch_array($result)) {
													array_push($arrayFuncoes,"<h6>{$row['NOME_FUNCAO']}:</h6>");
												}

												//Seleciona todos os nomes dos membros do conselho gestor que estao do banco
												$arrayNomes = array();
												$sqll="SELECT * FROM conselho_gestor";
												$resultt=mysqli_query($con,$sqll);
												if(!$resultt) {
													die('Could not get data: ' . mysql_error());
												}
												//Envia o html contendo o nome dos membros do conselho gestor para um array
												while($row = mysqli_fetch_array($resultt)) {
													//echo "<td contenteditable='true' name='funcao{$row['FK_ID_FUNCAO']}'>{$row['NOME']}</td>";
												array_push($arrayNomes,"<input type='text' class='form-control' name='funcao{$row['FK_ID_FUNCAO']}' value='{$row['NOME']}'></input>");
												}
												$size=count($arrayFuncoes);												
												echo "$arrayFuncoes[$i]";
												//Printo na tela todos registros de:
												//Nome da funcao
												//Input editavel com o nome do atual mebro do conselho
												for ($i=0; $i<$size; $i++) {
													echo "$arrayFuncoes[$i]";
													echo "$arrayNomes[$i]";
												}

											?>
										</tr>
									</thead>
								</table>
								
								<div align="right" style="align-self: right;align-items: right;">
									<button type="submit" class="btn btn-success">Salvar</button>
								</div>
							</div>
						</div>
					</div>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$sqlUpdate="";
							for ($i=1; $i < 5; $i++) {
								$nome=$_POST['funcao'.$i.''];
								$sqlUpdate.="UPDATE conselho_gestor SET NOME='$nome' WHERE FK_ID_FUNCAO= $i;";
							}
							if(mysqli_multi_query($con,$sqlUpdate)){
								echo "<script>Swal.fire(
								'Sucesso!',
								'Os membros do conselho foram atualizados com sucesso!',
								'success'
								).then(function() {
							    	window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor.php';
								});</script>";
							}else{
								echo "<script>Swal.fire({
								icon: 'Erro',
								title: 'Oops...',
								text: 'Não foi possivel alterar os membros do conselho, tente novamente!',
								}).then(function() {
							    	window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor.php';
								});</script>";
							}
						}
					?>
					
				</form>
				<!-- Editable table -->
				<br>
			</div>
		</main>
		<?php include '../footer.html'; ?>
	</body>
</html>