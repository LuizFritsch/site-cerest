<?php include 'HEADER.php'; ?>
<?php
include './database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-center">Publicações do CEREST OESTE</h1>
				<div class="container">
					<div class="row" id="equipe-cerest">
						<?php
						//CODIGO CARROSSEL ULTIMAS NOTICIAS//
						/**
							$sql="SELECT * FROM publicacoes ORDER BY 'ID_PUBLICACAO' DESC LIMIT 3";
							$results=mysqli_query($con,$sql);
							if(!$results) {
								die('Não foi possivel selecionar as ultimas publicações: ' . mysqli_error($con));
							}
							
							echo "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
								  <ol class='carousel-indicators'>
								    <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
								    <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
								    <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
								  </ol>
								  <div class='carousel-inner'>";
							//Exibe todas as publicacoes
							while($roww = mysqli_fetch_array($results)) {
								    echo "
								    <div class='carousel-item'>
								     <img src='{$roww['URL']}' alt=''>
										<div class='carousel-caption d-none d-md-block d-block w-100'>
											<p>{$roww['NOME']}</p>
										</div>
									</div>";
								    
							}
							echo "
								  <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
								    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
								    <span class='sr-only'>Anterior</span>
								  </a>
								  <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
								    <span class='carousel-control-next-icon' aria-hidden='true'></span>
								    <span class='sr-only'>Próxima</span>
								  </a>
								</div>";
						*/
						//CODIGO CARROSSEL ULTIMAS NOTICIAS//
						?>

						<?php
							$sql = "SELECT * FROM publicacoes WHERE FK_TIPO_PUBLICACAO = '1'";
							$result=mysqli_query($con,$sql);
							if(!$result) {
								die('Não foi possivel selecionar as publicações: ' . mysqli_error());
							}
							//Exibe todas as publicacoes
							while($row = mysqli_fetch_array($result)) {
								echo "<div class='card' style='width: 20rem;'>
										  <div class='embed-responsive embed-responsive-21by9'>
											<iframe class='embed-responsive-item' src='{$row['URL']}'></iframe>
										  </div>
										  <div class='card-body d-flex flex-column'>
										    <h5 class='my-0 font-weight-normal'>{$row['NOME']}</h5>
										    <hr>
										    <p class='card-text'>{$row['DESCRICAO']}</p>
										    <br>
										    <a href='{$row['URL']}' target='_blank' class='mt-auto btn btn-lg btn-block btn-primary'>Abrir</a>
										  </div>
										</div>
								";




								/**echo "<div class='col-xl-3 col-md-6 mb-4'>
												<div class='card border-0 shadow '>
															<div class='card-body text-center'>
																	<div class='embed-responsive embed-responsive-21by9'>
																	  <iframe class='embed-responsive-item' src='{$row['URL']}'></iframe>
																	</div>
																		<h5 class='card-title mb-0'><a href='{$row['URL']}' target='_blank'>{$row['NOME']}</a></h5>
															</div>
												</div>
									</div>";**/
							}

							/**
								echo "<div class='col-xl-3 col-md-6 mb-4'>
												<div class='card border-0 shadow '>
															<div class='card-body text-center'>
																		<embed src='{$row['URL']}' class='pdf embed-responsive-item' type='application/pdf'>
																		<h5 class='card-title mb-0'><a href='{$row['URL']}' target='_blank'>{$row['NOME']}</a></h5>
															</div>
												</div>
									</div>";
							*/
						?>
					</div>
				</div>
				<br>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>