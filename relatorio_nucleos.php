<?php
session_start();
if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
	echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
	echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
}else{
	$logado = $_SESSION['login'];
	$func = $_SESSION['func'];
	$senh = $_SESSION['senha'];
	$ide = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Relatório Semestral dos Núcleos em ST</title>
	</head>
	<body>
		<?php include 'HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Relatório Semestral dos Núcleos em ST</h1>
				<?php
				echo" <h4>Bem vindo $logado<h4>";
				echo" <br>";
				?>
				<div>
					<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<h6>Secretário de Saúde</h6>
								<input type="text" class="form-control" id="inputSecretario" placeholder="Digite o nome do Secretário de Saúde...">
							</div>
							<div class="form-group col-md-6">
								<h6>Profissional Responsável</h6>
								<input type="text" class="form-control" id="inputResponsavel" placeholder="Digite o nome do Profissional Responsável...">
							</div>
						</div>
						<div class="form-group">
							<h6>CNES</h6>
							<input type="text" class="form-control" id="inputCNES" placeholder="Digite o Nº CNES do Núcleos">
						</div>
						
						<br>
						<hr>
						<br>
						
						<h4>Realização de Notificações</h4>
						
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h6>Atenção Básica:</h6>
									<select class="form-control" id="selectAtencaoBasica">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h6>Pronto Socorrro</h6>
									<select class="form-control" id="selectProntoSocorro">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
									<h6>Hospital</h6>
									<select class="form-control" id="selectHospital">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<h6>Serviços Especializados</h6>
									<select class="form-control" id="selectServicosEspecializados">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<h6>Serviços Privados</h6>
									<select class="form-control" id="selectServicosPrivados">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
						</div>
						
						<br>
						<hr>
						<br>
						
						<h4>Notificação em Saúde do Trabalhador</h4>
						<br>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h5>1º Semestre</h5></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h5>2º Semestre</h5></a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-sm">
										<h6>Janeiro</h6>
										<input type="text" class="form-control" id="inputNotificacoesJaneiro" placeholder="Digite o nmr de notificações em Janeiro...">
									</div>
									<div class="col-sm">
										<h6>Fevereiro</h6>
										<input type="text" class="form-control" id="inputNotificacoesFevereiro" placeholder="Digite o nmr de notificações em Fevereiro...">
									</div>
									<div class="col-sm">
										<h6>Março</h6>
										<input type="text" class="form-control" id="inputNotificacoesMarço" placeholder="Digite o nmr de notificações em Março...">
									</div>
								</div>
								<div class="row">
									<div class="col-sm">
										<h6>Abril</h6>
										<input type="text" class="form-control" id="inputNotificacoesAbril" placeholder="Digite o nmr de notificações em Abril...">
									</div>
									<div class="col-sm">
										<h6>Maio</h6>
										<input type="text" class="form-control" id="inputNotificacoesMaio" placeholder="Digite o nmr de notificações em Maio...">
									</div>
									<div class="col-sm">
										<h6>Junho</h6>
										<input type="text" class="form-control" id="inputNotificacoesJunho" placeholder="Digite o nmr de notificações em Junho...">
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="row">
									<div class="col-sm">
										<h6>Julho</h6>
										<input type="text" class="form-control" id="inputNotificacoesJulho" placeholder="Digite o nmr de notificações em Julho...">
									</div>
									<div class="col-sm">
										<h6>Agosto</h6>
										<input type="text" class="form-control" id="inputNotificacoesAgosto" placeholder="Digite o nmr de notificações em Agosto...">
									</div>
									<div class="col-sm">
										<h6>Setembro</h6>
										<input type="text" class="form-control" id="inputNotificacoesSetembro" placeholder="Digite o nmr de notificações em Setembro...">
									</div>
								</div>
								<div class="row">
									<div class="col-sm">
										<h6>Outubro</h6>
										<input type="text" class="form-control" id="inputNotificacoesOutubro" placeholder="Digite o nmr de notificações em Outubro...">
									</div>
									<div class="col-sm">
										<h6>Novembro</h6>
										<input type="text" class="form-control" id="inputNotificacoesNovembro" placeholder="Digite o nmr de notificações em Novembro...">
									</div>
									<div class="col-sm">
										<h6>Dezembro</h6>
										<input type="text" class="form-control" id="inputNotificacoesDezembro" placeholder="Digite o nmr de notificações em Dezembro...">
									</div>
								</div>
							</div>
						</div>
						<br>
						<hr>
						<br>
						<h4>Atividades de Saúde do Trabalhador do Núcleo</h4>
						
						<br>
						
						<h6>Exemplo</h6>
						<div class="row">
							<div class="col-sm">
								<input class="form-control" type="text" placeholder="3" readonly>
							</div>
							<div class="col-sm">
								<input class="form-control" type="text" placeholder="Pedreiros" readonly>
							</div>
							<div class="col-sm">
								<input class="form-control" type="text" placeholder="0302050027" readonly>
							</div>
						</div>
						<br>
						<h4>Atendimentos Médicos:</h4>
						
						<div id="atdMedicos">
							<div class="row">
								<div class="col-sm">
									<h6>Quantidade</h6>
									<input type="text" class="form-control" id="inputQuantidade" placeholder="Digite o nmr de atendimentos realizados...">
								</div>
								<div class="col-sm">
									<h6>Profissão</h6>
									<input type="text" class="form-control" id="inputProfissao" placeholder="Digite a ocupação dos atendidos">
								</div>
								<div class="col-sm">
									<h6>Códigos</h6>
									<input type="text" class="form-control" id="inputCodigos" placeholder="Digite os códigos">
								</div>
							</div>
						</div>
						<br>
						<hr>
						<br>
						<h4>Atividades de educação e pesquisa em ST</h4>
						<br>
						
						<fieldset>
							<h6>Realiza atividades educativas/pesquisa/promoção de saúde?</h6>
							<h6>
							<input type="radio" name="solidworks" value="Yes" id="rdYes" />
							Sim
							</h6>
							<h6>
							<input type="radio" name="solidworks" value="No" id="rdNo" />
							Não
							</h6>
						</fieldset>
						<fieldset id="boxReseller" style="display:none;">
							<div class="atividadesEducativas">
								<h5>Atividades Educativas</h5>
								<div class="row">
									<div class="col-md-6">
										<div>
											TESTE
										</div>
									</div>
									<div class="col-md-6">
										
									</div>
								</div>
								
							</div>
						</fieldset>
						
						<script type="text/javascript">
							
						</script>
						
						<script type="text/javascript">
							jQuery(function(){
								jQuery("input[name=solidworks]").change(function(){
								if ($(this).val() == "Yes") {
									jQuery("#boxReseller").slideDown()
								}else {
									jQuery("#boxReseller").slideUp();
								}});
							});
						</script>
						<br>
						<div class="form-row">
							<div class="form-group col-md-6">
								<h6>Cidade</h6>
								<input type="text" class="form-control" id="inputCity">
							</div>
							<div class="form-group col-md-4">
								<h6>Estado</h6>
								<select id="inputEstado" class="form-control">
									<option selected>Escolher...</option>
									<option>...</option>
								</select>
							</div>
							<div class="form-group col-md-2">
								<h6>CEP</h6>
								<input type="text" class="form-control" id="inputCEP">
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<h6>
								Clique em mim
								</h6>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Enviar Relatório Semestral</button>
						<br>
						<br>
						
					</form>
				</div>
			</div>
			<br>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>