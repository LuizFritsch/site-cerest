<!DOCTYPE html>
<html>
	<head>
		<title>Relatório Semestral dos Núcleos em ST</title>
	</head>
	<body>
		<?php include 'header.html'; ?>
		<main>
			<div class="content text-break">
				<h1 class="text-justify">Relatório Semestral dos Núcleos em ST</h1>
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
						<hr>
						<h4>Realização de Notificações</h4>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownAtencaoBasica" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Atenção Básica
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownAtencaoBasica">
								<a class="dropdown-item">Sim</a>
								<a class="dropdown-item" href="#">Não</a>
							</div>
						</div>
						<br>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownAtencaoBasica" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pronto Socorro
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownProntoSocorro">
								<a class="dropdown-item">Sim</a>
								<a class="dropdown-item" href="#">Não</a>
							</div>
						
						</div>

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