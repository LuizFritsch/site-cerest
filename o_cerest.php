<?php include 'HEADER.php'; ?>
<?php
include './database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>O Cerest</title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				
				<div class="o-que-e-o-cerest">
					<h1 id="t" class="text-center">O que é o CEREST?</h1>
					<p class="text-justify">O Centro Regional de Referência em Saúde do Trabalhador, da Região Oeste do Rio Grande do Sul, é um serviço do Sistema Único de Saúde (SUS), com sede em Alegrete. Possui ação regional atendendo os municípios da 10ª Coordenadoria Regional de Saúde. É regulamentado pelas Portarias do Ministério da Saúde Números 1679/2002, 2437/2005, 2728/2009.</p>
					<p class="text-justify">Dá suporte técnico para a Atenção Integral ao SUS, com ações de Prevenção, Promoção, Diagnóstico, Tratamento, Reabilitação e Vigilância em Saúde dos Trabalhadores e Trabalhadoras Urbanos e Rurais.</p>
					<div class="atendimento text-center">
						<img alt="pessoa sendo atendida no cerest" src="./img/frenteCerest.jpg" class="zoom responsive img-fluid">
						<p class="text-center descricaoImagem"><strong>Fachada do CEREST OESTE.</strong></p>
						<p></p>
					</div>
				</div>
				
				<hr>
				<div class="acoes-cerest">
					<h1>Ações do CEREST</h1>
					<div class="just-padding">
						<div class="list-group list-group-root well">
							
							<a href="#item-1" class="list-group-item" data-toggle="collapse">
								<i class="glyphicon glyphicon-chevron-right"></i>>Educação e Pesquisa em Saúde do Trabalhador:
							</a>
							<div class="list-group collapse" id="item-1">
								
								<a href="#item-1-1" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Capacitação dos Profissionais do SUS;
								</a>
								<a href="#item-1-2" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Projetos e Pesquisas em Saúde do Trabalhador no Âmbito da Região Oeste;
								</a>
								<a href="#item-1-3" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right">- Palestras e Divulgação para a Comunidade (Trabalhadores e Empregadores) e o Controle Social.</i>
								</a>
							</div>
							
							<a href="#item-2" class="list-group-item" data-toggle="collapse">
								<i class="glyphicon glyphicon-chevron-right"></i>>Vigilância e Informação em Saúde do Trabalhador:
							</a>
							
							<div class="list-group collapse" id="item-2">
								
								<a href="#item-2-1" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Notificações SIST-RS e SINAN (Portaria 104/2011);
								</a>
								
								<a href="#item-2-2" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Investigação de Acidentes de Trabalho Grave e Óbito no Trabalho (suporte técnico à Vigilância Epidemiológica do Município com auxílio da 10ª CRS); Protocolo de Investigação do Acidente de Trabalho Fatal.
								</a>
								
								<a href="#item-2-3" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Vigilância aos Processos e Ambientes de Trabalho.
								</a>
								
							</div>
							
							
							<a href="#item-3" class="list-group-item" data-toggle="collapse">
								<i class="glyphicon glyphicon-chevron-right"></i>>Assistência e Reabilitação:
							</a>
							<div class="list-group collapse" id="item-3">
								
								<a href="#item-3-1" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Acompanhamento da Equipe de Enfermagem;
								</a>
								
								<a href="#item-3-2" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Acompanhamento/Avaliação Médica;
								</a>
								
								<a href="#item-3-3" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Acompanhamento/Avaliação Psicológica;
								</a>
								<a href="#item-3-4" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Reabilitação Fisioterápica.
								</a>
								
							</div>
							<a href="#item-4" class="list-group-item" data-toggle="collapse">
								<i class="glyphicon glyphicon-chevron-right"></i>>Ações Interinstitucionais:
							</a>
							
							<div class="list-group collapse" id="item-4">
								
								<a href="#item-4-1" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Ministério da Previdência Social (Gerência Regional do INSS);
								</a>
								<a href="#item-4-2" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right"></i>- Ministério do Trabalho e Emprego (Gerência Regional);
								</a>
								<a href="#item-4-3" class="list-group-item" data-toggle="collapse">
									<i class="glyphicon glyphicon-chevron-right">- Universidades (UNIPAMPA, URCAMP).</i>
								</a>
							</div>
							
						</div>
						
					</div>
				</div>
				
				<hr>
				<div class="conselho-gestor-cerest">
					<h1>
					Conselho Gestor do CEREST OESTE
					</h1>
					<!--
						<ul class="list-unstyled">
							<li>O CEREST OESTE conta com a gestão participativa do Conselho Gestor:
								<ul class="membros">
									<li>Presidente: (segmento usuário);</li>
									<li>Suplente do Presidente: (segmento gestor);</li>
									<li>Secretário: (segmento usuário);</li>
									<li>Suplente do Secretário: (segmento profissional de saúde).</li>
								</ul>
							</li>
						</ul>
					-->
						<!--
						<div class="card">
							<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Conselho gestor do CEREST</h3>
							<div class="card-body">
								<div id="table" class="table-editable">
									<table class="table table-bordered text-center table-hover-cells">
										<thead>
											<tr>
												<?php
													$sql="SELECT * FROM funcoes_conselho";
													$result=mysqli_query($con,$sql);
													if(!$result ) {
														die('Could not get data: ' . mysql_error());
													}
													while($row = mysqli_fetch_array($result)) {
														echo "<th scope='col'>{$row['NOME_FUNCAO']}</th> ";
													}
												?>
											</tr>
										</thead>
										<tbody>
											<tr>
												<?php
													$sql="SELECT * FROM conselho_gestor";
													$result=mysqli_query($con,$sql);
													if(!$result ) {
														die('Could not get data: ' . mysql_error());
													}
													while($row = mysqli_fetch_array($result)) {
														//echo "<td contenteditable='true' name='funcao{$row['FK_ID_FUNCAO']}'>{$row['NOME']}</td>";
														echo "<td><h6>{$row['NOME']}</h6></td>";
													}
												?>
											</tr>
										</tbody>
									</table>
									
								</div>
							</div>
						</div>-->




						<!-------------------------------------------------------------------------->
					<h5>O CEREST OESTE conta com a gestão participativa do Conselho Gestor:</h5>
					<div class="container">
						<div class="row" id="equipe-cerest">
							<!--SELECT conselho_gestor.NOME, funcoes_conselho.nome_funcao FROM conselho_gestor INNER JOIN funcoes_conselho on conselho_gestor.FK_ID_FUNCAO=funcoes_conselho.ID_FUNCAO_CONSELHO-->
							<!--card que deve ser repetido-->

								<?php
									$sql="SELECT conselho_gestor.NOME, funcoes_conselho.nome_funcao FROM conselho_gestor INNER JOIN funcoes_conselho on conselho_gestor.FK_ID_FUNCAO=funcoes_conselho.ID_FUNCAO_CONSELHO";
									$result=mysqli_query($con,$sql);
									if(!$result ) {
										die('Could not get data: ' . mysql_error());
									}
									while($row = mysqli_fetch_array($result)) {
										echo "<div class='col-xl-3 col-md-6 mb-4'>
									<div class='card border-0 shadow'>
										<div class='card-body text-center'>
											<h5 class='card-title mb-0'>{$row['NOME']}</h5>
											<div class='card-text text-black-50'><b>{$row['nome_funcao']}</b></div>
										</div>
									</div>
								</div>";
									}
								?>
							<!---->
						</div>
					</div>
				</div>
				<p></p>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>