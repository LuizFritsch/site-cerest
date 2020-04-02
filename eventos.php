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
				<?php
					$sqlEventosAbertos="SELECT * FROM eventos WHERE STATUS=1";

					$resultEventosAbertos=mysqli_query($con,$sqlEventosAbertos);
					if(!$resultEventosAbertos) {
						die('Nao foi possivel coletar os dados dos eventos que estao abertos: ' . mysql_error($con));
					}else{
						while($row = mysqli_fetch_array($resultEventosAbertos)) {
						echo "<div class='col-xl-3 col-md-6 mb-4'>
								<div class='card border-0 shadow'>
									<div class='card-body text-center'>
										<h5 class='card-title mb-0'>{$row['NOME']}</h5>
										<div class='card-text text-black-50'><b>{$row['DESCRICAO']}</b></div>
									</div>
								</div>
							  </div>";
						}
					}
				?>
				<hr>
				<!--EVENTOS JA CONCLUIDOS-->
				<h5>Eventos Ja concluidos</h5>
				<?php
					$sqlEventosConcluidos="SELECT * FROM eventos WHERE STATUS=0";
					$resultEventosConcluidos=mysqli_query($con,$sqlEventosConcluidos);
					if(!$resultEventosConcluidos) {
						die('Nao foi possivel coletar os dados dos eventos ja concluidos: ' . mysql_error($con));
					}else{
						while($row = mysqli_fetch_array($resultEventosConcluidos)) {
						echo "<div class='col-xl-3 col-md-6 mb-4'>
								<div class='card border-0 shadow'>
									<div class='card-body text-center'>
										<h5 class='card-title mb-0'>{$row['NOME']}</h5>
										<div class='card-text text-black-50'><b>{$row['DESCRICAO']}</b></div>
									</div>
								</div>
							  </div>";
						}
					}
				?>
				<br>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>