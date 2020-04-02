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
				<h5>Eventos abertos</h5>
				<div class="container">
					<div class="row">
						<?php
							$sqlEventosAbertos="SELECT * FROM eventos WHERE STATUS=1";
							$resultEventosAbertos=mysqli_query($con,$sqlEventosAbertos);
							if(!$resultEventosAbertos) {
								die('Nao foi possivel coletar os dados dos eventos que estao abertos: ' . mysql_error($con));
							}else{
								if(isset($_SESSION['login']) && isset($_SESSION['func'])){
									while($row = mysqli_fetch_array($resultEventosAbertos)) {
										echo "<div class='card' style='width: 20rem;'>
												  <div class='card-body d-flex flex-column'>
												    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
												    <hr>
												    <p class='card-text'>{$row['DESCRICAO']}</p>
												    <br>
												    <a class='mt-auto btn btn-lg btn-block btn-success'>Inscrever-me</a>
												  </div>
												</div>";
									}
								}else{
									while($row = mysqli_fetch_array($resultEventosAbertos)) {
										echo "<div class='card' style='width: 20rem;'>
												  <div class='card-body d-flex flex-column'>
												    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
												    <hr>
												    <p class='card-text'>{$row['DESCRICAO']}</p>
												  </div>
												</div>";
									}
								}
								
							}
						?>
					</div>
				</div>
				<hr>
				<!--EVENTOS JA CONCLUIDOS-->
				<h5>Eventos Ja concluidos</h5>
				<div class="container">
					<div class="row">
						<?php
							$sqlEventosConcluidos="SELECT * FROM eventos WHERE STATUS=0";
							$resultEventosConcluidos=mysqli_query($con,$sqlEventosConcluidos);
							if(!$resultEventosConcluidos) {
								die('Nao foi possivel coletar os dados dos eventos ja concluidos: ' . mysql_error($con));
							}else{
								while($row = mysqli_fetch_array($resultEventosConcluidos)) {
								echo "<div class='card' style='width: 20rem;'>
												  <div class='card-body d-flex flex-column'>
												    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
												    <hr>
												    <p class='card-text'>{$row['DESCRICAO']}</p>
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