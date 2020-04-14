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
			<div class="content text-justify">
				<h1 id="t" class="text-center">Eventos</h1>
				<br>
				<div id="divPublicacoes">
				<div class="table-responsive tabela">
					<table class="table table-striped display" id="eventos">
						<thead>
							<tr>
								<th scope="col" id="tabela-eventos">Nome do evento</th>
								<th scope="col">Descricao</th>
								<th scope="col">Data de Inicio</th>
								<th scope="col">Data de Termino</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								try {

									//seleciona todos eventos ordenado por eventos que estao com as inscricoes abertas
									$sql="SELECT * FROM eventos ORDER BY STATUS_INSCRICOES DESC";
									$result=mysqli_query($con,$sql);
									
									if(!$result) {
										die('Nao foi possivel : ' . mysqli_error($con));
									}
									//se tiver algum registro
									while($rowww = mysqli_fetch_array($result)) {
										
										/**seleciona os eventos que o usuario logado esta inscrito*/
										$sqlUsuarioInscrito = "SELECT COUNT(1) as boo FROM inscritos_eventos WHERE inscritos_eventos.FK_ID_USUARIO='$ide' and FK_ID_EVENTO='{$rowww['ID']}'";
										$res  = mysqli_query($con,$sqlUsuarioInscrito);
										$estaInscrit=mysqli_fetch_assoc($res);
										/***/

										/**converte as datas de inicio e fim para o formato BR, pois o bd armazena no americano*/
										$data_inicio=date_format(date_create($rowww['DATA_INICIO']),'d/m/Y');
										$data_fim=date_format(date_create($rowww['DATA_FIM']),'d/m/Y');
										/***/

										/**printa nome, descricao, data_inicio, data_fim*/
										echo "<tr>
												<td>{$rowww['NOME']}</td>
												<td>{$rowww['DESCRICAO']}</td>
												<td>$data_inicio</td>
												<td>$data_fim</td>";

										/**se o usuario nao esta logado*/
										if (!isset($_SESSION['login'])) {
										/***/
											/**apresenta o botao para realizar login*/
											echo "<td><a href='login.php' class='mt-auto btn btn-lg btn-block btn-secondary'>Realize Login para se Inscrever</a></td>";
											/***/

										/**Se o usuario nao esta inscrito e as inscricoes daquele evento estiverem abertas*/
										}elseif($estaInscrit['boo']==0 AND $rowww['STATUS_INSCRICOES']==1){
										/***/
											/**apresenta um botao de se inscrever*/
											echo "<form method='POST' id='form{$rowww['ID']}'>";
											echo "<td>
													<button class='mt-auto btn btn-lg btn-block btn-success' type='submit'>Inscrever-se</button>
												  </td>";
											/**inputs escondidos contendo idEvento, tipoRequisicao se 1 entao inscreve o usuario se 0 entao cancela a inscricao*/
											echo "<input type='hidden' name='tipoRequisicao' value='1'></input>";
											echo "<input type='hidden' name='idevento' value='{$rowww['ID']}'></input>";
											echo "<input type='hidden' name='idusuario' value='$ide'></input>";
											echo "</form>";
										/**Se o usuario esta inscrito e as inscricoes daquele evento estiverem abertas*/
										}elseif($estaInscrit['boo']==1 AND $rowww['STATUS_INSCRICOES']==1){
										/***/
											echo "<form method='POST' id='form{$rowww['ID']}'>";
											/**inputs escondidos contendo idEvento, tipoRequisicao se 1 entao inscreve o usuario se 0 entao cancela a inscricao*/
											echo "<td>
													<button class='mt-auto btn btn-lg btn-block btn-success btn-inscrito' id='btn-inscrito' type='submit'>Ja estou inscrito neste evento</button>
												  </td>";
											echo "<input type='hidden' name='tipoRequisicao' value='0'></input>";
											echo "<input type='hidden' name='idevento' value='{$rowww['ID']}'></input>";
											echo "<input type='hidden' name='idusuario' value='$ide'></input>";
											echo "</form>";
											/**Se o usuario nao esta inscrito e as inscricoes daquele evento estiverem fechadas apresenta apenas evento encerrado*/
											}elseif($estaInscrit['boo']==0 AND $rowww['STATUS_INSCRICOES']==0){
												echo "<td><button class='mt-auto btn btn-lg btn-block btn-secondary' disabled>Evento encerrado</button></td>";
											/**Se o usuario esta inscrito e as inscricoes daquele evento estiverem fechadas apresenta participei deste evento*/
											}elseif($estaInscrit['boo']==1 AND $rowww['STATUS_INSCRICOES']==0){
												echo "<td><button class='mt-auto btn btn-lg btn-block btn-secondary' disabled>Participei deste evento</button></td>";
											}
										echo "</tr>";
									}
								} catch (Exception $e) {
									echo "<script>Swal.fire({
											icon: 'error',
										    title: 'Oops, aconteceu algum erro...',
										    text: 'por favor, tente mais tarde!',
										    });</script>";
								}
								
							?>
						</tbody>
					</table>
				</div>
				</div>
						<?php
							try {
								if($_SERVER['REQUEST_METHOD'] == 'POST'){					
									if ($_POST['tipoRequisicao']==1) {
										$idevento=$_POST['idevento'];
										$idusuario=$_POST['idusuario'];
										$sqlInserirUsuarioEvento="INSERT INTO inscritos_eventos(FK_ID_USUARIO,FK_ID_EVENTO) VALUES ('$idusuario','$idevento')";
										echo "$sqlInserirUsuarioEvento";
										if ($resultSa = mysqli_query($con, $sqlInserirUsuarioEvento)) {
													echo "<script>Swal.fire(
															'Sucesso!',
													        'Inscricao efetuada com sucesso!',
													        'success'
													      ).then(function() {
													      		window.location.replace('https://guilherme.cerestoeste.com.br/eventos.php');
													      });</script>";	
										}else{
													echo "<script>Swal.fire({
															icon: 'error',
													        title: 'Oops...',
													        text: 'Não foi possivel lhe inscrever neste evente, tente novamente mais tarde!',
													      }).then(function() {
													      		window.location.replace('https://guilherme.cerestoeste.com.br/eventos.php');
													      });</script>";							            			
										}
									}elseif ($_POST['tipoRequisicao']==0) {
										$idevento=$_POST['idevento'];
										$idusuario=$_POST['idusuario'];
										$sqlDeletaUsuarioEvento="DELETE FROM inscritos_eventos WHERE FK_ID_USUARIO='$idusuario' AND FK_ID_EVENTO='$idevento'";
										if ($resultSsa = mysqli_query($con, $sqlDeletaUsuarioEvento)) {
													echo "<script>Swal.fire(
															'Sucesso!',
													        'Sua inscricao foi cancelada com sucesso!',
													        'success'
													      ).then(function() {
														      	window.location.replace('https://guilherme.cerestoeste.com.br/eventos.php');
													      });</script>";	
										}else{
													echo "<script>Swal.fire({
															icon: 'error',
													        title: 'Oops...',
													        text: 'Não foi possivel cancelar sua inscricao, tente novamente mais tarde!',
													      }).then(function() {
													      		window.location.replace('https://guilherme.cerestoeste.com.br/eventos.php');
													      });</script>";							            			
										}
									}
								}else{}
							} catch (Exception $e) {
								echo "<script>Swal.fire({
												icon: 'error',
											    title: 'Oops, aconteceu algum erro...',
											    text: 'por favor, tente mais tarde!',
											    });</script>";
							}
						?>
		<script type="text/javascript">
			/**
				Funcao de transformar uma tabela em datatable
			*/
			$(document).ready(function() {
				$('#eventos').dataTable();
			} );
		</script>

		<script type="text/javascript">
			/**
				Tentativa de tornar o input de filtro do datatable responsivo
			*/
			$(document).ready(function () {             
			  $('.dataTables_filter input[type="search"]').css(
			  	{'width':'100%'}
			  );
			});
		</script>

		<script type="text/javascript">
			/**
				Funcao pra quando abrir no smartphone, o primeiro click no botao de ja estou inscrito, virar cancelar inscricao
			*/
			document.addEventListener("touchstart", function() {}, true);
		</script>

		<script type="text/javascript">
			/**
				Funcao que n permite o reenvio de formulario
			*/
		    if ( window.history.replaceState ) {
		        window.history.replaceState( null, null, window.location.href );
		    }
		</script>

		<script type="text/javascript">
			/**
				Validacao do datatable
			*/
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