<?php include '../HEADER.php'; ?>
<?php
include '../database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Visualizar Eventos</title>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<!--
		<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"></script>
		-->

		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>


		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
		<script src="" type="text/javascript"></script>
		<script src="" type="text/javascript"></script>
		<script src="" type="text/javascript"></script>
		<script src='https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css'></script>;
		<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css'></script>
		<script src='https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css'></script>
		<script src='https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js'></script>
		<script src='https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
		<script src='https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js'></script>
		<script src='https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js'></script>
		<script src='https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js'></script>
	</head>
	<body>
		<?php
			if(isset($_SESSION['login']) && isset($_SESSION['senha']) && $_SESSION['id']==4){
				$logado = $_SESSION['login'];
				$func = $_SESSION['func'];
				$senh = $_SESSION['senha'];
				$ide = $_SESSION['id'];
			}else{
				echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
				echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/');</script>";
			}
		?>
		<main>
			<div class="content text-justify">

				<?php
					$idPaciente=$_GET['idPaciente'];
					$sqlss="SELECT * FROM paciente inner join usuario_comum where paciente.FK_ID_USUARIO_COMUM=$idPaciente AND usuario_comum.ID=$idPaciente";
					echo "$sqlss";
					$resultss=mysqli_query($con,$sqlss);
					if(!$resultss) {
						die('Could not get data: ' . mysqli_error($con));
					}
					$paciente = mysqli_fetch_array($resultss);
					$cpf=$paciente['CPF'];
					$nomeCompleto=$paciente['NOME_COMPLETO'];
					$cartaosus=$paciente['CARTAO_SUS'];
					echo "-";
					echo "-";
					echo "$id";
					echo "$nomeCompleto";
					echo "$cartaosus";
				?>

				
				<div class="form-group">
					
				</div>
				<form>
					<div id="divPublicacoes">
						<br>
						<br>
						<form>
							<fieldset disabled>
							    <div class="form-group">
							      <label for="descricao">Nome Completo</label>
							      <input type="text" id="descricao" class="form-control" value="<?php echo $nomeCompleto; ?>">
							    </div>

							    <div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="dataInicio">CPF</label>
								    		<input type="text" id="dataInicio" class="form-control" value="<?php echo $cpf; ?>">
										</div>
										<div class="col-md-6">
											<label for="dataFim">Cartao SUS</label>
								    		<input type="text" id="dataFim" class="form-control" value="<?php echo $cartaosus; ?>">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</form>
			
				<br>
				<br>

				<div class="table-responsive tabela">
							<table class="table table-striped display" id="example">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-eventos">ID</th>
										<th scope="col">Paciente</th>
										<th scope="col">Cartão SUS</th>
										<th scope="col">Ocupação</th>
										<th scope="col">Data de Nascimento</th>
										<th scope="col">Prontuário</th>
									</tr>
								</thead>
								<tbody>
									<?php
										try {
											$sql="SELECT * FROM prontuario WHERE prontuario.FK_ID_USUARIO_COMUM=$idPaciente";
											$result=mysqli_query($con,$sql);
												if(!$result ) {
													die('Could not get data: ' . mysqli_error($con));
												}
												while($row = mysqli_fetch_array($result)) {
													echo "<tr>
																<td scope='row'>{$row['ID']}</th>
																<td>{$row['NOME_COMPLETO']}</td>
																<td>{$row['CARTAO_SUS']}</td>
																<td>{$row['OCUPACAO']}</td>
																<td>{$row['DATA_NASCIMENTO']}</td>
																<td><a href=\"visualizar_prontuario.php?idPaciente=".$row['ID']."&user-id=".$_ide."\" type='button' class='btn btn-info'>Visualizar Prontuário</a></td>
															";
													echo "</tr>";
												}
										}catch(Exception $e){
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
		</main>
		<script type="text/javascript">
			function alteraStatusInscricao(idEvento,statsInscricoes){
				var idEvento=idEvento;
				var statsInscricoes=statsInscricoes.checked;
				if(statsInscricoes == true){
			       statusInscricoes=1;
			    	$.ajax({
                       url:'altera_status_inscricao.php',
                       method:'POST',
                       data:{
                           idEvento:idEvento,
                           statusInscricoes:statusInscricoes 
                       },
                       success:function(response){
                           Swal.fire(
								'Sucesso!',
								'As inscricoes foram abertas!',
								'success'
								);
                       }
                    });
			    }else{
			       statusInscricoes=0;
			       $.ajax({
                       url:'altera_status_inscricao.php',
                       method:'POST',
                       data:{
                           idEvento:idEvento,
                           statusInscricoes:statusInscricoes 
                       },
                       success:function(response){
                           Swal.fire(
								'Sucesso!',
								'As inscricoes foram fechadas!',
								'success'
								);
                       }
                    });
			   	}
			}
		</script>
		<script type="text/javascript">
			function cancelarInscricao(id,idEvento){
				$.ajax({
                    url:'cancelar_inscricao.php',
                    method:'POST',
                    data:{
                        id:id,
                        idEvento:idEvento
                    },
                    success:function(response){
                        Swal.fire(
							'Sucesso!',
							'As inscricoes foram abertas!',
							'success'
						).then(function() {
							location.reload();
						});
                    }
                });
			}
		</script>
		<?php include '../../footer.html'; ?>
	</body>
</html>