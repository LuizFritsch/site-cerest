<?php include '../../HEADER.php'; ?>
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
					$data_inicio=date_format(date_create($evento['DATA_INICIO']),'d/m/Y');
					$data_fim=date_format(date_create($evento['DATA_FIM']),'d/m/Y');
				?>

				<h1 id="t" class="text-center"><?php echo "$nomeEvento"; ?></h1>
				<div class="form-group">
					<label for="statsInscricoes<?php echo $evento['ID'];?>">Status das Inscricoes</label>
					<?php
						if ($evento['STATUS_INSCRICOES']==1) {
							echo "<input class='form-control' id='statsInscricoes{$evento['ID']}' name='statsInscricoes{$evento['ID']}' type='checkbox' checked data-toggle='toggle' data-on='Abertas' data-off='Fechadas' data-onstyle='success' data-offstyle='danger' onchange='alteraStatusInscricao({$evento['ID']},statsInscricoes{$evento['ID']})' onclick='alteraStatusInscricao({$evento['ID']},statsInscricoes{$evento['ID']})'>";
						}elseif ($evento['STATUS_INSCRICOES']==0) {
							echo "<input class='form-control' id='statsInscricoes{$evento['ID']}' name='statsInscricoes{$evento['ID']}' type='checkbox' data-toggle='toggle' data-on='Abertas' data-off='Fechadas' data-onstyle='success' data-offstyle='danger' onchange='alteraStatusInscricao({$evento['ID']},statsInscricoes{$evento['ID']})' onclick='alteraStatusInscricao({$evento['ID']},statsInscricoes{$evento['ID']})'>";
						}
					?>
				</div>
				<form>
					<div id="divPublicacoes">
						<br>
						<br>
						<form>
							<fieldset disabled>
							    <div class="form-group">
							      <label for="descricao">Descricao</label>
							      <input type="text" id="descricao" class="form-control" value="<?php echo $evento['DESCRICAO']; ?>">
							    </div>

							    <div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="dataInicio">Data de Inicio</label>
								    		<input type="text" id="dataInicio" class="form-control" value="<?php echo $data_inicio; ?>">
										</div>
										<div class="col-md-6">
											<label for="dataFim">Data de Termino</label>
								    		<input type="text" id="dataFim" class="form-control" value="<?php echo $data_fim; ?>">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
						<hr>
						<div class="row">
						  <div class="col-sm-8">
						  	<a name='idEvento' href="editar_evento.php?idEvento=<?php echo $idEvent;?>&user-id=<?php echo $ide;?>" type='button' class='form-control btn btn-outline-warning'>Editar informacoes</a>
						    </div>
						  <div class="col-sm-4">
						  	<?php
						    	echo "<a type='button' class='form-control btn btn-outline-danger' onclick='excluirEvento({$evento['ID']})'>Excluir este evento</a>";
						    ?>	
						  </div>
						</div>
						<hr>
						<br>
						<br>
						<h2 class="text-center">Inscritos neste evento</h2>
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
															<td>{$row['NOME_COMPLETO']}</td>
															<td>{$row['CPF']}</td>													
															<td>{$row['RG']}</td>													
															<td>{$row['CELULAR']}</td>
															<td>{$row['EMAIL']}</td>
															<td>{$row['ENDERECO']}</td>
															<td>{$row['LOCAL_TRABALHO']}<input type='hidden' name='id' value='{$row['ID']}'></input></td>
															<td><a type='button' class='btn btn-outline-danger' onClick='cancelarInscricao({$row['ID']},$idEvent)'>Cancelar Inscricao</a></td>
														</tr>";
											}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</form>

				<br>
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
	            	  "last":       "Última",
				      "previous": "Anterior",
				      "next": "Próximo"
			    	}
			  	},
			  	"Buttons":[
			  		'copy','excel','pdf'
			  	],
			  	"Search": {
            		"addClass": 'form-control input-lg col-xs-12'
        		},
        		"fnDrawCallback":function(){
		            $("input[type='search']").attr("id", "searchBox");
		            $('#dialPlanListTable').css('cssText', "margin-top: 0px !important;");
		            $("select[name='dialPlanListTable_length'], #searchBox").removeClass("input-sm");
		            $('#searchBox').css("width", "300px").focus();
		            $('#dialPlanListTable_filter').removeClass('dataTables_filter');
        		}
			} );
		</script>
		<?php include '../../footer.html'; ?>
	</body>
</html>