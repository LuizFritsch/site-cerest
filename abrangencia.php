<!DOCTYPE html>
<html>
	<head>
		<title>Abrangência</title>
	</head>
	<body>
		<?php include 'HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Abrangência do CEREST OESTE:</h1>
				<p class="text-justify"></p>
				<div class="atendimento text-center">
					<img alt="mapa de abrangencia do cerest oeste" src="./img/mapaAbrangencia.png" class="zoom responsive img-fluid">
					<p class="text-center descricaoImagem"><strong>Mapa de abrangência do CEREST OESTE.</strong></p>
				</div>
				
				<p id="nuc">
					<strong>
					Núcleos Municipais em Saúde do Trabalhador:
					</strong>
				</p>
				<!--
				<div id="class1" class="image-container">
												<button class="">An image</button>
												<a href="">An Image</a>
				</div>
				<div id="class1-container" class="text-container">
												<p>Some Content1</p>
				</div>
				<div id="class2" class="image-container">
												<a href="">An Image</a>
				</div>
				<div id="class2-container" class="text-container">
												<p>Some Content2</p>
				</div>-->
				<div class="row">
					<div class="col-4">
						<div class="list-group" id="list-tab" role="tablist">
							
							<a class="list-group-item list-group-item-action active scrollNucleo" id="alegrete-list" data-toggle="list" href="#list-alegrete" role="tab" aria-controls="alegrete">Alegrete</a>
							<a class="list-group-item list-group-item-action disabled">Barra do Quaraí</a>
							<a class="list-group-item list-group-item-action scrollNucleo" id="itaqui-list" data-toggle="list" href="#list-itaqui" role="tab" aria-controls="itaqui">Itaqui</a>
							<a class="list-group-item list-group-item-action disabled">Maçambará</a>
							<a class="list-group-item list-group-item-action disabled">Manoel Viana</a>
							<a class="list-group-item list-group-item-action disabled">Quaraí</a>
							<a class="list-group-item list-group-item-action scrollNucleo" id="rosario-list" data-toggle="list" href="#list-rosario" role="tab" aria-controls="rosario">Rosário do Sul</a>
							<a class="list-group-item list-group-item-action disabled">Santa Margarida do Sul</a>
							<a class="list-group-item list-group-item-action disabled">Santana do Livramento</a>
							<a class="list-group-item list-group-item-action disabled">São Gabriel</a>
							<a class="list-group-item list-group-item-action" id="uruguaiana-list" data-toggle="list" href="#list-uruguaiana" role="tab" aria-controls="uruguaiana">Uruguaiana</a>
						</div>
					</div>
					
					<div class="col-8">
						<div class="tab-content" id="nav-tabContent">
							
							<div class="tab-pane fade show active" id="list-alegrete" role="tabpanel" aria-labelledby="list-alegrete">
								<div class="logo">
									<div class="text-center">
										<img alt="Logo do CEREST OESTE" src="./img/iconeCEREST.png" class="nucleo zoom responsive img-fluid">
										<p></p>
									</div>
								</div>
								<div class="contato">
									<p><strong>Contato:</strong></p>
									<p>Telefone: <a href="tel:+555534227778">+55 55 3422-7778</a></p>
									<p>Email: <a href="mailto:oestecerest@gmail.com">oestecerest@gmail.com</a></p>
								</div>
								
							</div>
							<div class="tab-pane fade" id="list-itaqui" role="tabpanel" aria-labelledby="list-itaqui">
								<div class="logo">
									<div class=" text-center">
										<img alt="Logo do nucleo do cerest em Itaqui-rs" src="./img/iconeNucleoItaqui.png" class="zoom responsive img-fluid nucleo">
										<p></p>
									</div>
								</div>
								<div class="contato">
									<p><strong>Contato:</strong></p>
									<p>Telefone: <a href="tel:+555534332323">+55 55 3433-2323</a></p>
								</div>
							</div>
							<div class="tab-pane fade" id="list-rosario" role="tabpanel" aria-labelledby="list-rosario">
								<div class="logo">
									<div class=" text-center">
										<img alt="Logo do nucleo do cerest em Rosário do Sul-rs" src="./img/iconeNucleoRosario.png" class="zoom responsive img-fluid nucleo">
										<p></p>
									</div>
								</div>
								<div class="contato">
									<p><strong>Contato:</strong></p>
									<p>Telefone: <a href="tel:+555534332323">+55 55 3433-2323</a></p>
									<p>Email: <a href="mailto:numstrosul@gmail.com">numstrosul@gmail.com</a></p>
								</div>
							</div>
							<div class="tab-pane fade" id="list-uruguaiana" role="tabpanel" aria-labelledby="list-uruguaiana">
								<div class="logo">
									<div class=" text-center">
										<img alt="Logo do nucleo do cerest em Uruguaiana-rs" src="./img/iconeNucleoUruguaiana.png" class="zoom responsive img-fluid nucleo">
										<p></p>
									</div>
								</div>
								<div class="contato">
									<p><strong>Contato:</strong></p>
									<p>Email: <a href="mailto:nucleotrabalhador.uruguaiana@yahoo.com.br">nucleotrabalhador.uruguaiana@yahoo.com.br</a></p>
								</div>
							</div>
							<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
							<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
						</div>
					</div>
				</div>
				<p></p>
			</div>
			
		</main>
		<?php include 'footer.html'; ?>
		</script>
	</body>
</html>