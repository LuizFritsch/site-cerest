<?php include '../HEADER.php'; ?>
<?php
include '../database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fisioterapia</title>
		<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    	<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
		<script type="text/javascript" src="https://guilherme.cerestoeste.com.br/script/scriptEventos.js"></script>
		<script type="text/javascript" src="https://guilherme.cerestoeste.com.br/script/gambiarraEventos.js"></script>
		<script type="text/javascript">
		var jQuery_3_6_1 = $.noConflict(true);
		</script>

		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
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
				<h1 id="t" class="text-center">Fisioterapia</h1>
				
				<form>
					<div id="divPublicacoes">
						<div class="form-group">
							<hr>
							<h3>Informações sobre pacientes</h3>
						</div>
						<br>
						<br>
						<div class="table-responsive tabela">
							<table class="table table-striped display" id="example">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-eventos">ID</th>
										<th scope="col">Paciente</th>
										<th scope="col">Cartão SUS</th>
										<th scope="col">Telefone</th>
										<th scope="col">Email</th>
										<th scope="col">Ocupação</th>
										<th scope="col">Data de Nascimento</th>
										<th scope="col">Voltou a trabalhar?</th>
										<th scope="col">Prontuário</th>
									</tr>
								</thead>
								<tbody>
									<?php
										try {
											$sql="SELECT *, paciente.ID AS pid FROM paciente inner join usuario_comum where paciente.FK_ID_USUARIO_COMUM=usuario_comum.ID";
											$result=mysqli_query($con,$sql);
												if(!$result ) {
													die('Could not get data: ' . mysqli_error($con));
												}
												while($row = mysqli_fetch_array($result)) {
													$stts=$row['STATUS_TRABALHO'];
													echo "<tr>
																<td scope='row'>{$row['pid']}</th>
																<td>{$row['NOME_COMPLETO']}</td>
																<td>{$row['CARTAO_SUS']}</td>
																<td>{$row['TELEFONE']}</td>
																<td>{$row['EMAIL']}</td>
																<td>{$row['OCUPACAO']}</td>
																<td>{$row['DATA_NASCIMENTO']}</td>";
																if ($row['STATUS_TRABALHO']==1) {
																		echo "<td><input id='statsTrabalho{$row['pid']}' name='statsTrabalho{$row['pid']}' type='checkbox' checked data-toggle='toggle' data-on='Retornou' data-off='Não Retornou' data-onstyle='success' data-offstyle='danger' onchange='alteraStatusTrabalho({$row['pid']},statsTrabalho{$row['pid']})' onclick='alteraStatusTrabalho({$row['pid']},statsTrabalho{$row['pid']})'></td>";
																		echo "<script>jQuery_3_6_1('#statsTrabalho{$row['pid']}').bootstrapToggle();</script>";
																	}elseif ($row['STATUS_TRABALHO']==0) {
																		echo "<td><input id='statsTrabalho{$row['pid']}' name='statsTrabalho{$row['pid']}' type='checkbox' data-toggle='toggle' data-on='Retornou' data-off='Não Retornou' data-onstyle='success' data-offstyle='danger' onchange='alteraStatusTrabalho({$row['pid']},statsTrabalho{$row['pid']})' onclick='alteraStatusTrabalho({$row['pid']},statsTrabalho{$row['pid']})'></td>";
																	}

													echo "<td><a href=\"visualizar_prontuario.php?idPaciente=".$row['ID']."&user-id=".$_ide."\" type='button' class='btn btn-info'>Visualizar Prontuário</a></td>
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
				</form>
					<script type="text/javascript">
						$(document).ready(function() {
							$('#example').dataTable();
						} );
					</script>
					<script type="text/javascript">
						$('#example').dataTable( {
							"language": {
							  	"emptyTable": "Não há nenhum paciente",
							  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ entradas",
							  	"infoEmpty": "Mostrando 0 de um total de 0 entradas",
							  	"infoFiltered":   "(filtrado de um total de _MAX_ total entradas)",
						        "infoPostFix":    "",
						        "thousands":      ".",
						        "lengthMenu":     "Mostrar _MENU_ pacientes",
							  	"loadingRecords": "Carregando...",
						        "processing":     "Processando...",
						        "search":         "Buscar:",
							  	"searchPlaceholder": "Filtre por qualquer coisa aqui...",
						        "zeroRecords":    "Não há dados",
							    "paginate": {
							      "first":      "Primeira",
				            	  "last":       "Última",
							      "previous": "Anterior",
							      "next": "Próximo"
						    }
						  },
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
				<br>
			</div>
		</main>
		<script type="text/javascript">
					function alteraStatusTrabalho(idPaciente,statsTrabalho){
						var idPaciente=idPaciente;
						var statsTrabalho=statsTrabalho.checked;
						if(statsTrabalho == true){
					       statsTrabalho=1;
					    	jQuery_3_6_1.ajax({
		                       url:'altera_status_trabalho.php',
		                       method:'POST',
		                       data:{
		                           idPaciente:idPaciente,
		                           statsTrabalho:statsTrabalho 
		                       },
		                       success:function(response){
		                           Swal.fire(
										'Sucesso!',
										'o status de trabalho do paciente foi atualizado!',
										'success'
										);
		                       }
		                    });
					    }else{
					       statsTrabalho=0;
					       jQuery_3_6_1.ajax({
		                       url:'altera_status_trabalho.php',
		                       method:'POST',
		                       data:{
		                           idPaciente:idPaciente,
		                           statsTrabalho:statsTrabalho 
		                       },
		                       success:function(response){
		                           Swal.fire(
										'Sucesso!',
										'o status de trabalho do paciente foi atualizado!!',
										'success'
										);
		                       }
		                    });
					   	}
					}
				</script>
		<?php include '../footer.html'; ?>
	</body>
</html>