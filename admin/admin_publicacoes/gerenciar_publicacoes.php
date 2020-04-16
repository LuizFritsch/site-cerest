<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciar Publicacoes</title>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


		<!--<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>-->
		
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
				<h1 id="t" class="text-center">Gerenciar Publicações</h1>
				<form>
					<div id="divPublicacoes">
						<div class="form-group">
							<hr>
							<a type="button" class="btn btn-success btn-lg btn-block btn-lg btn-block" href="./adicionar_publicacao.php#t">Adicionar Publicação</a>
							<hr>
						</div>
						<br>
						<br>
						<div class="table-responsive tabela">
							<table class="table table-striped display" id="example">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-publicacoes">ID</th>
										<th scope="col">Nome da Publicação</th>
										<th scope="col">Tipo de Publicação</th>
										<th scope="col"><!--Visualizar--></th>
										<th scope="col"><!--Editar--></th>
										<th scope="col"><!--Excluir--></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="SELECT * FROM publicacoes";
										$result=mysqli_query($con,$sql);
											if(!$result ) {
												die('Could not get data: ' . mysqli_error($con));
											}
											while($row = mysqli_fetch_array($result)) {
												echo "<tr>
																	<th scope='row'>{$row['ID_PUBLICACAO']}</th>
																	<td>{$row['NOME']}</td>
																	<td>{$row['FK_TIPO_PUBLICACAO']}</td>
																	<td><a type='button' target='_blank' href='{$row['URL']}' class='btn btn-primary'>Visualizar PDF</a></td>
																	<td><a href=\"editar_publicacao.php?id=".$row['ID_PUBLICACAO']."&user-id=".$_ide."\" type='button' class='btn btn-warning'>Editar</a></td>
																		<td><a type='button' class='btn btn-danger' href=\"delete_publicacao.php?id=".$row['ID_PUBLICACAO']."&user-id=".$_ide."\">Excluir</a></td>
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
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
		<script type="text/javascript">
			$('#example').dataTable( {
				"language": {
				  	"emptyTable": "Não há nenhuma publicação",
				  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ entradas",
				  	"infoEmpty": "Mostrando 0 de um total de 0 entradas",
				  	"infoFiltered":   "(filtrado de um total de _MAX_ total entradas)",
			        "infoPostFix":    "",
			        "thousands":      ".",
			        "lengthMenu":     "Mostrar _MENU_ publicações",
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
		<?php include '../../footer.html'; ?>
	</body>
</html>