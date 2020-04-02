<?php include 'HEADER.php'; ?>
<?php
include './database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Eventos</title>
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
												    <a class='mt-auto btn btn-lg btn-block btn-success'>Inscrever-me</a>
												  </div>
												</div>";
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