<!DOCTYPE html>
<html>
	<head>
		<title>Relatório Semestral dos Núcleos em ST</title>
	</head>
	<body>
		<?php include 'header.html'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Relatório Semestral dos Núcleos em ST</h1>
				<div>
					<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputSecretario">Secretário de Saúde</label>
								<input type="text" class="form-control" id="inputSecretario" placeholder="Digite o nome do Secretário de Saúde...">
							</div>
							<div class="form-group col-md-6">
								<label for="inputResponsavel">Profissional Responsável</label>
								<input type="text" class="form-control" id="inputResponsavel" placeholder="Digite o nome do Profissional Responsável...">
							</div>
						</div>
						<div class="form-group">
							<label for="inputCNES">CNES</label>
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
									<label for="selectAtencaoBasica">Atenção Básica:</label>
									<select class="form-control" id="selectAtencaoBasica">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="selectProntoSocorro">Pronto Socorrro</label>
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
									<label for="selectHospital">Hospital</label>
									<select class="form-control" id="selectHospital">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="selectServicosEspecializados">Serviços Especializados</label>
									<select class="form-control" id="selectServicosEspecializados">
										<option>Sim</option>
										<option>Não</option>
									</select>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="selectServicosPrivados">Serviços Privados</label>
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
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">1º Semestre</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">2º Semestre</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-sm">
										<label for="inputNotificacoesJaneiro">Janeiro</label>
										<input type="text" class="form-control" id="inputNotificacoesJaneiro" placeholder="Digite o nmr de notificações em Janeiro...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesFevereiro">Fevereiro</label>
										<input type="text" class="form-control" id="inputNotificacoesFevereiro" placeholder="Digite o nmr de notificações em Fevereiro...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesMarco">Março</label>
										<input type="text" class="form-control" id="inputNotificacoesMarço" placeholder="Digite o nmr de notificações em Março...">
									</div>
								</div>
								<div class="row">
									<div class="col-sm">
										<label for="inputNotificacoesAbril">Abril</label>
										<input type="text" class="form-control" id="inputNotificacoesAbril" placeholder="Digite o nmr de notificações em Abril...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesMaio">Maio</label>
										<input type="text" class="form-control" id="inputNotificacoesMaio" placeholder="Digite o nmr de notificações em Maio...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesJunho">Junho</label>
										<input type="text" class="form-control" id="inputNotificacoesJunho" placeholder="Digite o nmr de notificações em Junho...">
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="row">
									<div class="col-sm">
										<label for="inputNotificacoesJulho">Julho</label>
										<input type="text" class="form-control" id="inputNotificacoesJulho" placeholder="Digite o nmr de notificações em Julho...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesAgosto">Agosto</label>
										<input type="text" class="form-control" id="inputNotificacoesAgosto" placeholder="Digite o nmr de notificações em Agosto...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesSetembro">Setembro</label>
										<input type="text" class="form-control" id="inputNotificacoesSetembro" placeholder="Digite o nmr de notificações em Setembro...">
									</div>
								</div>
								<div class="row">
									<div class="col-sm">
										<label for="inputNotificacoesOutubro">Outubro</label>
										<input type="text" class="form-control" id="inputNotificacoesOutubro" placeholder="Digite o nmr de notificações em Outubro...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesNovembro">Novembro</label>
										<input type="text" class="form-control" id="inputNotificacoesNovembro" placeholder="Digite o nmr de notificações em Novembro...">
									</div>
									<div class="col-sm">
										<label for="inputNotificacoesDezembro">Dezembro</label>
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
						<p>Exemplo:</p>
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
						<h5>Atendimentos Médicos:</h5>
						
						<div id="atdMedicos">
							<div class="row">
								<div class="col-sm">
									<label for="inputQuantidade">Quantidade</label>
									<input type="text" class="form-control" id="inputQuantidade" placeholder="Digite o nmr de atendimentos realizados...">
								</div>
								<div class="col-sm">
									<label for="inputProfissao">Profissão</label>
									<input type="text" class="form-control" id="inputProfissao" placeholder="Digite a ocupação dos atendidos">
								</div>
								<div class="col-sm">
									<label for="inputCodigos">Códigos</label>
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
							<legend>Realiza atividades educativas/pesquisa/promoção de saúde?</legend>
							<label for="">
								<input type="radio" name="solidworks" value="Yes" id="rdYes" />
								Sim
							</label>
							<label for="">
								<input type="radio" name="solidworks" value="No" id="rdNo" />
								Não
							</label>
						</fieldset>
						<fieldset id="boxReseller" style="display:none;">
							<div class="atividadesEducativas">
								<div class="row">
											<label for="atividade">Atividade Educativa</label>
									<div class="col-md-2">
										<div>
											<input type="text" class="form-control" id="inputAtividade" placeholder="Digite o nome da atividade..." name="mytext[]">
										</div>
									</div>
									<div class="col-md-2">
										<button class="btn add_form_field">Adicionar +</button>
									</div>
								</div>	
								
							</div>

						</fieldset>
						
						<script type="text/javascript">
							$(document).ready(function() {
							var max_fields = 10;
							var wrapper = $(".atividadesEducativas");
							var add_button = $(".add_form_field");
							var x = 1;
							$(add_button).click(function(e) {
							e.preventDefault();
							if (x < max_fields) {
								x++;
								$(wrapper).append('<div><input type="text" class="form-control" id="inputAtividade" placeholder="Digite o nome da atividade" name="mytext[]"><a href="#" class="delete">Delete</a></div>'); //add input box
							} else {
								alert('You Reached the limits')
							}});
							$(wrapper).on("click", ".delete", function(e) {
							e.preventDefault();
							$(this).parent('div').remove();
							x--;
							})});
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
								<label for="inputCity">Cidade</label>
								<input type="text" class="form-control" id="inputCity">
							</div>
							<div class="form-group col-md-4">
								<label for="inputEstado">Estado</label>
								<select id="inputEstado" class="form-control">
									<option selected>Escolher...</option>
									<option>...</option>
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="inputCEP">CEP</label>
								<input type="text" class="form-control" id="inputCEP">
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">
									Clique em mim
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Entrar</button>
					</form>
				</div>
			</div>
			<br>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>