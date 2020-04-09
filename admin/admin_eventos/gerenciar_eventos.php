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
				<h1 id="t" class="text-center">Gerenciar Eventos</h1>
				<form>
					<div id="divPublicacoes">
						<div class="form-group">
							<hr>
							<a type="button" class="btn btn-success btn-lg btn-block btn-lg btn-block" href="./adicionar_eventos.php#t">Adicionar Evento</a>
							<hr>
						</div>
						<br>
						<br>
						<div class="table-responsive tabela">
							<table class="table table-striped display" id="example">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-eventos">ID</th>
										<th scope="col">Nome do evento</th>
										<th scope="col">Descricao do evento</th>
										<th scope="col">Status Inscricao</th>
										<th scope="col"><!--Visualizar/Editar Evento--></th>
										<th scope="col"><!--Editar--></th>
										<th scope="col"><!--Excluir--></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="SELECT * FROM eventos";
										$result=mysqli_query($con,$sql);
											if(!$result ) {
												die('Could not get data: ' . mysqli_error($con));
											}
											while($row = mysqli_fetch_array($result)) {
												//BOOLEAN STATUS COM 
												echo "<tr>
																	<th scope='row'>{$row['ID']}</th>
																	<td>{$row['NOME']}</td>
																	<td>{$row['DESCRICAO']}</td>";
																	if ($row['STATUS_INSCRICOES']==1) {
																		echo "<td><input id='statsInscricoes{$row['ID']}' name='statsInscricoes{$row['ID']}' type='checkbox' checked data-toggle='toggle' data-on='Abertas' data-off='Fechadas' data-onstyle='success' data-offstyle='danger' onchange='alteraStatusInscricao({$row['ID']},statsInscricoes{$row['ID']})' onclick='alteraStatusInscricao({$row['ID']},statsInscricoes{$row['ID']})'></td>";
																	}elseif ($row['STATUS_INSCRICOES']==0) {
																		echo "<td><input id='statsInscricoes{$row['ID']}' name='statsInscricoes{$row['ID']}' type='checkbox' data-toggle='toggle' data-on='Abertas' data-off='Fechadas' data-onstyle='success' data-offstyle='danger' onchange='alteraStatusInscricao({$row['ID']},statsInscricoes{$row['ID']})' onclick='alteraStatusInscricao({$row['ID']},statsInscricoes{$row['ID']})'></td>";
																	}
																	echo" <td><a href=\"visualizar_evento.php?idEvento=".$row['ID']."&user-id=".$_ide."\" type='button' class='btn btn-info'>Visualizar Evento</a></td>
																		  <td><a href=\"editar_evento.php?idEvento=".$row['ID']."&user-id=".$_ide."\" type='button' class='btn btn-warning'>Editar</a></td>
																		  <td><a type='button' class='btn btn-danger' onclick='excluirEvento({$row['ID']})'>Excluir</a></td>
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
			function excluirEvento(idEvento){
				const swalWithBootstrapButtons = Swal.mixin({
				  customClass: {
				    confirmButton: 'btn btn-success',
				    cancelButton: 'btn btn-danger'
				  },
				  buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
				  title: 'Tem certeza que deseja excluir este evento?',
				  text: "Voce nao sera capaz de reverter esta decisao!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonText: 'Sim, eu desejo excluir!',
				  cancelButtonText: 'Nao, eu nao desejo mais excluir!',
				  reverseButtons: true
				}).then((result) => {
				  if (result.value) {
				    $.ajax({
	                    url:'excluir_evento.php',
	                    method:'POST',
	                    data:{
	                       idEvento:idEvento
	                    },
	                    success:function(response){
	                        Swal.fire(
								'Sucesso!',
								'O evento foi excluido com sucesso!',
								'success'
							).then(function() {
								location.reload();
							});
	                    }
	                });
				  } else if (
				    /* Read more about handling dismissals below */
				    result.dismiss === Swal.DismissReason.cancel
				  ) {
				    swalWithBootstrapButtons.fire(
				      'Cancelado',
				      'Seu evento nao foi excluido e ta seguro :)',
				      'error'
				    )
				  }
				})
			}
		</script>
		
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
			$(document).ready(function() {
				$('#eventos').dataTable();
			} );
		</script>
		<script type="text/javascript">
			$('#example').dataTable( {
				"language": {
				  	"emptyTable": "Não há nenhum evento disponivel",
				  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ entradas",
				  	"infoEmpty": "Mostrando 0 de um total de 0 entradas",
				  	"infoFiltered":   "(filtrado de um total de _MAX_ total entradas)",
			        "infoPostFix":    "",
			        "thousands":      ".",
			        "lengthMenu":     "Mostrar _MENU_ eventos",
				  	"loadingRecords": "Carregando...",
			        "processing":     "Processando...",
			        "search":         "Buscar:",
				  	"searchPlaceholder": "Filtre por qualquer coisa aqui...",
			        "zeroRecords":    "Não há nenhum evento disponivel",
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