<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciar Publicacoes</title>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
	</head>
	<body>
		<?php
			if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
			echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
			echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
			}else{
				$logado = $_SESSION['login'];
				$func = $_SESSION['func'];
				$senh = $_SESSION['senha'];
				$ide = $_SESSION['id'];
			}
			include '../../database/db_connection.php';
			$con=OpenCon();
			$logado = $_SESSION['login'];
			$func = $_SESSION['func'];
			$senh = $_SESSION['senha'];
			$ide = $_SESSION['id'];
		?>
		<main>
			<div class="content text-justify">

				<?php
					$idEvent=$_GET['idEvento'];
					$sqlss="SELECT  * FROM eventos WHERE ID='$idEvent'";
					$resultss=mysqli_query($con,$sqlss);
					if(!$resultss) {
						die('Could not get data: ' . mysqli_error($con));
					}
					$evento = mysqli_fetch_array($resultss);
					$nomeEvento=$evento['NOME'];
				?>

				<h1 id="t" class="text-center"><?php echo "$nomeEvento"; ?></h1>
				<form>
					<div id="divPublicacoes">
						<br>
						<br>
						<hr>
						
						<div class="table-responsive tabela">
							<table class="table table-striped display" id="example">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-eventos">Nome Completo</th>
										<th scope="col">CPF</th>
										<th scope="col">RG</th>
										<th scope="col">Celular</th>
										<th scope="col">Email</th>
										<th scope="col">Endereco</th>
										<th scope="col">Local de Trabalho</th>
										<th scope="col"><!--CANCELAR INSCRI--></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$idEvent=$_GET['idEvento'];
										$sql="SELECT DISTINCT * FROM usuario_comum INNER JOIN inscritos_eventos WHERE FK_ID_USUARIO=usuario_comum.ID AND FK_ID_EVENTO='$idEvent'";
										$result=mysqli_query($con,$sql);
											if(!$result ) {
												die('Could not get data: ' . mysqli_error($con));
											}
											while($row = mysqli_fetch_array($result)) {
												//BOOLEAN STATUS COM 
												echo "<tr>
															<th scope='row'>{$row['NOME_COMPLETO']}</th>
															<td>{$row['CPF']}</td>													
															<td>{$row['RG']}</td>													
															<td>{$row['CELULAR']}</td>
															<td>{$row['EMAIL']}</td>
															<td>{$row['ENDERECO']}</td>
															<td>{$row['LOCAL_TRABALHO']}<input type='hidden' name='id' value='{$row['ID']}'></input></td>
															<td><a type='button' class='btn btn-danger' onClick='cancelarInscricao({$row['ID']},$idEvent)'>Cancelar Inscricao</a></td>
														</tr>";
											}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</form>

				<br>

			</div>
		</main>
		
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
		<script type="text/javascript">
			$(document).ready(function() {
				$('#eventos').dataTable();
			} );
		</script>
		<script type="text/javascript">
			$('#example').dataTable( {
				"language": {
				  	"emptyTable": "Não há nenhum inscrito neste evento",
				  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ inscritos",
				  	"infoEmpty": "Mostrando 0 de um total de 0 inscritos",
				  	"infoFiltered":   "(filtrado de um total de _MAX_ total inscritos)",
			        "infoPostFix":    "",
			        "thousands":      ".",
			        "lengthMenu":     "Mostrar _MENU_ inscritos",
				  	"loadingRecords": "Carregando...",
			        "processing":     "Processando...",
			        "search":         "Buscar:",
				  	"searchPlaceholder": "Filtre por qualquer coisa aqui...",
			        "zeroRecords":    "Não há nenhum inscrito neste evento",
				    "paginate": {
				      "first":      "Primeira",
	            	  "last":       "ÚLtima",
				      "previous": "Anterior",
				      "next": "Próximo"
			    }
			  }
			} );
		</script>
		<?php include '../../footer.html'; ?>
	</body>
</html>