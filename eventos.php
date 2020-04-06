<?php include 'HEADER.php'; ?>
<?php
include './database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Eventos</title>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
		<link rel="stylesheet" type="text/css" href="./style/style.css">
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Eventos</h1>
				<!--EVENTOS QUE ESTAO ATIVOS-->
				<br>
				
						<?php
						//abertos
						//fechados
						//tabela todos c filtro
							$sqlEventosAbertos="SELECT * FROM eventos WHERE STATUS_INSCRICOES=1";
							$resultEventosAbertos=mysqli_query($con,$sqlEventosAbertos);
							if(!$resultEventosAbertos OR $resultEventosAbertos==NULL) {
								die('Nao foi possivel coletar os dados dos eventos com inscrições abertas: ' . mysql_error($con));
							}else{
								if(isset($_SESSION['login']) && isset($_SESSION['func'])){

									//SELECIONAR TODOS OS DADOS DE EVENTOS, ONDE USUARIO ESTA INSCRITO
									$ide = $_SESSION['func'];
									$sq="SELECT * FROM eventos INNER JOIN inscritos_eventos on inscritos_eventos.FK_ID_USUARIO='$ide' AND eventos.ID=inscritos_eventos.FK_ID_EVENTO";
									$resultJaInscritos=mysqli_query($con,$sq);
									echo "<br>";
									echo "<hr>";
									echo "<br>";
									echo "<b><h4>Eventos que voce ja esta inscrito</h4></b>";
									echo "<br>";
									echo "<div class='container'>
											<div class='row'>";
									while($row = mysqli_fetch_array($resultJaInscritos)) {
										$data_inicio=date_format(date_create($row['DATA_INICIO']),'d/m/Y');
										$data_fim=date_format(date_create($row['DATA_FIM']),'d/m/Y');
										echo "<form method='POST'>";
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
												    <input type='hidden' name='idevento' value='{$row['ID']}'></input>
												    <input type='hidden' name='idusuario' value='$ide'></input>
												    <button class='mt-auto btn btn-lg btn-block btn-success' type='submit' disabled>Ja esta inscrito neste evento</button>
												  </div>
												</div>";
										echo "</form>";
									}
										echo "</div></div>";
									//SELECIONAR TODOS OS DADOS DE EVENTOS, ONDE USUARIO NAO ESTA INSCRITO
									$sqll="SELECT * FROM eventos WHERE eventos.STATUS_INSCRICOES=1 AND NOT EXISTS(SELECT * FROM inscritos_eventos WHERE inscritos_eventos.FK_ID_USUARIO='$ide' AND FK_ID_EVENTO=eventos.ID)";
									$resultEventosNaoInscrito=mysqli_query($con,$sqll);
									echo "<br>";
									echo "<hr>";
									echo "<br>";
									echo "<b><h4>Eventos com inscricoes abertas</h4></b>";
									echo "<br>";
									echo "<div class='container'>
											<div class='row'>";
									while($row = mysqli_fetch_array($resultEventosNaoInscrito)) {
										$data_inicio=date_format(date_create($row['DATA_INICIO']),'d/m/Y');
										$data_fim=date_format(date_create($row['DATA_FIM']),'d/m/Y');
										echo "<form method='POST'>";
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
													<input type='hidden' name='idevento' value='{$row['ID']}'></input>
												    <input type='hidden' name='idusuario' value='$ide'></input>
												    <button class='mt-auto btn btn-lg btn-block btn-success' type='submit'>Inscrever-se</button>
												  </div>
												</div>";
										echo "</form>";
										echo "</div></div>";
									}
								}else{
									echo "<div class='container'>
											<div class='row'>";
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
									echo "</div></div>";
								}
								
							}
						?>
						<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){					
								$idevento=$_POST['idevento'];
								$idusuario=$_POST['idusuario'];
								$sqlInserirUsuarioEvento="INSERT INTO inscritos_eventos(ID,FK_ID_USUARIO,FK_ID_EVENTO) VALUES(DEFAULT,'$idusuario','$idevento')";

								echo "$sqlInserirUsuarioEvento";
								if ($resultSa = mysqli_query($con, $sqlInserirUsuarioEvento)) {
											echo "<script>Swal.fire(
													'Sucesso!',
											        'Edição efetuada com sucesso!',
											        'success'
											      ).then(function() {
											      		window.location = 'https://guilherme.cerestoeste.com.br/eventos.php#t';
											      });</script>";	
								}else{
											echo "<script>Swal.fire({
													icon: 'error',
											        title: 'Oops...',
											        text: 'Não foi possivel editar, tente novamente mais tarde!',
											      }).then(function() {
											      		window.location = 'https://guilherme.cerestoeste.com.br/eventos.php#t'
											      });</script>";							            			
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
				<hr>
				<br>
				<!--Todos Eventos-->
				<b><h4>Todos eventos</h4></b>
				<br>
				<div class="container">
					<div class="row">
						<div class="table-responsive tabela">
							<table class="table table-striped display" id="eventos">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-eventos">Nome do evento</th>
										<th scope="col">Descricao</th>
										<th scope="col">Data de Inicio</th>
										<th scope="col">Data de Termino</th>
										<th scope="col"><!--Excluir--></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="SELECT * FROM eventos ORDER BY STATUS_INSCRICOES DESC";
										$result=mysqli_query($con,$sql);
											if(!$result ) {
												die('Nao foi possivel : ' . mysql_error());
											}
											while($row = mysqli_fetch_array($result)) {
												$sqlUsuarioInscrito = "SELECT COUNT(1) FROM inscritos_eventos WHERE inscritos_eventos.FK_ID_USUARIO='$ide' and FK_ID_EVENTO='{$row['ID']}'";
												$estaInscrito  = mysqli_query($con,$sqlUsuarioInscrito);
													
												$data_inicio=date_format(date_create($row['DATA_INICIO']),'d/m/Y');
												$data_fim=date_format(date_create($row['DATA_FIM']),'d/m/Y');
												echo "<tr>
														<td scope='row'>{$row['NOME']}</td>
														<td>{$row['DESCRICAO']}</td>
														<td>$data_inicio</td>
														<td>$data_fim</td>";
												if (!isset($_SESSION['login'])) {
													echo "<td><a href='login.php' class='mt-auto btn btn-lg btn-block btn-secondary'>Realize Login para se Inscrever</a></td>";
												}elseif($estaInscrito==0 AND $row['STATUS_INSCRICOES']==1){
													echo "<td><button class='mt-auto btn btn-lg btn-block btn-success' type='submit'>Inscrever-se</button></td>";
												}elseif ($estaInscrito==1 AND $row['STATUS_INSCRICOES']==1) {
													echo "<td><button class='mt-auto btn btn-lg btn-block btn-success btn-inscrito' id='btn-inscrito' type='submit'>Ja esta inscrito neste evento</button></td>";
												}elseif ($estaInscrito==0 AND $row['STATUS_INSCRICOES']==0) {
													echo "<td><button class='mt-auto btn btn-lg btn-block btn-secondary' type='submit' disabled>Evento encerrado</button></td>";
												}elseif ($estaInscrito==1 AND $row['STATUS_INSCRICOES']==0) {
													echo "<td><button class='mt-auto btn btn-lg btn-block btn-secondary' type='submit' disabled>Evento encerrado</button></td>";
												}
														
													echo "</tr>";
											}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<script type="text/javascript">
			$(document).ready(function() {
				$('#eventos').dataTable();
			} );
		</script>
		<script type="text/javascript">
			$('#eventos').dataTable( {
				"language": {
				  	"emptyTable": "Não há nenhum evento",
				  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ eventos",
				  	"infoEmpty": "Mostrando 0 de um total de 0 eventos",
				  	"infoFiltered":   "(filtrado de um total de _MAX_ total eventos)",
			        "infoPostFix":    "",
			        "thousands":      ".",
			        "lengthMenu":     "Mostrar _MENU_ eventos",
				  	"loadingRecords": "Carregando...",
			        "processing":     "Processando...",
			        "search":         "Buscar:",
				  	"searchPlaceholder": "Filtre por qualquer coisa aqui...",
			        "zeroRecords":    "Não há dados",
				    "paginate": {
				      "first":      "Primeira",
	            	  "last":       "ÚLtima",
				      "previous": "Anterior",
				      "next": "Próximo"
			    }
			  }
			} );
		</script>
			</div>
			
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>