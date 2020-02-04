<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php include '../HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Noticias</h1>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<a href="https://guilherme.cerestoeste.com.br">
								<img class="d-block w-100" src="../img/frenteCerest.jpg" alt="First slide">
							</a>
						</div>
						<div class="carousel-item">
							<a href="https://guilherme.cerestoeste.com.br">
								<img class="d-block w-100" src="../img/frenteCerest.jpg" alt="First slide">
							</a>
						</div>
						<div class="carousel-item">
							<a href="https://guilherme.cerestoeste.com.br">
								<img class="d-block w-100" src="../img/frenteCerest.jpg" alt="First slide">
							</a>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</main>
		<?php include '../footer.html'; ?>
	</body>
</html>