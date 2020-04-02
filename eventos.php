<?php include 'HEADER.php'; ?>
<?php
include './database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Eventos</title>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Eventos</h1>
				<!--EVENTOS QUE ESTAO ATIVOS-->
				<b><h4>Eventos com inscrições abertas</h4></b>
				<br>
				<div class="container">
					<div class="row">
						<?php
							$sqlEventosAbertos="SELECT * FROM eventos WHERE STATUS_INSCRICOES=1";
							$resultEventosAbertos=mysqli_query($con,$sqlEventosAbertos);
							if(!$resultEventosAbertos OR $resultEventosAbertos==NULL) {
								die('Nao foi possivel coletar os dados dos eventos com inscrições abertas: ' . mysql_error($con));
							}else{
								if(isset($_SESSION['login']) && isset($_SESSION['func'])){
									$ide = $_SESSION['func'];
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//verificar se ja esta inscrito, se ja, desativar botao de se inscrever
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									//###################################################################################################################################
									while($row = mysqli_fetch_array($resultEventosAbertos)) {
										$data_inicio=date_format(date_create($row['DATA_INICIO']),'d/m/Y');
										$data_fim=date_format(date_create($row['DATA_FIM']),'d/m/Y');
										echo "<form method='POST'>";
										echo "<div class='card' style='width: 20rem;'>
												  <div class='card-body d-flex flex-column'>
												    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
												    <hr>
												    <p class='card-text'>{$row['DESCRICAO']}</p>
												    <hr>
												    <p class='card-text'>$data_inicio</p>
													<p class='card-text'>até</p>
													<p class='card-text'>$data_fim</p>	
												    <br>
												    <input type='hidden' name='idevento' value='{$row['ID']}'></input>
												    <input type='hidden' name='idusuario' value='$ide'></input>
												    <button class='mt-auto btn btn-lg btn-block btn-success' type='submit'>Inscrever-me</button>
												  </div>
												</div>";
										echo "</form>";
									}
								}else{
									while($row = mysqli_fetch_array($resultEventosAbertos)) {
										$data_inicio=date_format(date_create($row['DATA_INICIO']),'d/m/Y');
										$data_fim=date_format(date_create($row['DATA_FIM']),'d/m/Y');
										echo "<div class='card' style='width: 20rem;'>
												  <div class='card-body d-flex flex-column'>
												    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
												    <hr>
												    <p class='card-text'>{$row['DESCRICAO']}</p>
													<hr>
													<p class='card-text'>$data_inicio</p>
													<p class='card-text'>até</p>
													<p class='card-text'>$data_fim</p>											    
												    <br>
												    <a href='login.php' class='mt-auto btn btn-lg btn-block btn-secondary'>Realize Login para se Inscrever</a>
												  </div>
												</div>";
									}
								}
								
							}
						?>
						<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){					
								$idevento=$_POST['idevento'];
								$idusuario=$_POST['idusuario'];
								$sqlInserirUsuarioEvento="INSERT INTO inscritos_eventos(ID,FK_ID_USUARIO,FK_ID_EVENTO) VALUES(DEFAULT,'$idusuario','$idevento')";

								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//verificar se ja esta inscrito
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################
								//###################################################################################################################################

								if ($resultSa = mysqli_query($con, $sqlInserirUsuarioEvento)) {
											echo "<script>Swal.fire(
													'Sucesso!',
											        'Edição efetuada com sucesso!',
											        'success'
											      ).then(function() {
											      		window.location = 'https://guilherme.cerestoeste.com.br/eventos.php#t';
											      });</script>";	
								}else{
											echo "<script>Swal.fire({
													icon: 'error',
											        title: 'Oops...',
											        text: 'Não foi possivel editar, tente novamente mais tarde!',
											      }).then(function() {
											      		window.location = 'https://guilherme.cerestoeste.com.br/eventos.php#t'
											      });</script>";							            			
								}
							}
						?>
					</div>
				</div>
				<br>
				<hr>
				<br>
				<!--EVENTOS JA CONCLUIDOS-->
				<b><h4>Eventos com inscrições já encerradas</h4></b>
				<br>
				<div class="container">
					<div class="row">
						<?php
							$sqlEventosConcluidos="SELECT * FROM eventos WHERE STATUS_INSCRICOES=0";
							$resultEventosConcluidos=mysqli_query($con,$sqlEventosConcluidos);
							if(!$resultEventosConcluidos OR $resultEventosConcluidos==NULL) {
								die('Nao foi possivel coletar os dados dos eventos já concluidos: ' . mysql_error($con));
							}else{
								while($row = mysqli_fetch_array($resultEventosConcluidos)) {
									$data_inicio=date_format(date_create($row['DATA_INICIO']),'d/m/Y');
									$data_fim=date_format(date_create($row['DATA_FIM']),'d/m/Y');
									echo "<div class='card' style='width: 20rem;'>
													  <div class='card-body d-flex flex-column'>
													    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
													    <hr>
													    <p class='card-text'>{$row['DESCRICAO']}</p>
													    <hr>
													    <p class='card-text'>$data_inicio</p>												    
													    <p class='card-text'>até</p>
														<p class='card-text'>$data_fim</p>
													  </div>
													</div>";
								}
							}
						?>
					</div>
				</div>
				<br>
			</div>
			
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>