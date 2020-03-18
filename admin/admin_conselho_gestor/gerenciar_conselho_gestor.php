<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel Admin Conselho Gestor</title>
		 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		 <script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
		 <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
	</head>
	<body>
		<?php
			if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
				echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
				echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
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
				<h1 id="t" class="text-center">Gerenciar Conselho Gestor</h1>
				
				<form>
					<div id="divPublicacoes">
						<div class="form-group">
							<hr>
							<a type="button" class="btn btn-success btn-lg btn-block btn-lg btn-block" href="./adicionar_funcao.php#t">Adicionar Função</a>
							<hr>
						</div>
						<br>
						<br>
						<div class="table-responsive tabela">
							<table class="table table-striped display" id="example">
								
								<thead>
									<tr>
										<th scope="col" id="tabela-publicacoes">ID</th>
										<th scope="col">Função</th>
										<th scope="col">Membro</th>
										<th scope="col"><!--Editar--></th>
										<th scope="col"><!--Excluir--></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql="SELECT conselho_gestor.ID_MEMBRO, conselho_gestor.NOME, conselho_gestor.FK_ID_FUNCAO, funcoes_conselho.nome_funcao FROM conselho_gestor INNER JOIN funcoes_conselho on conselho_gestor.FK_ID_FUNCAO=funcoes_conselho.ID_FUNCAO_CONSELHO";
										$result=mysqli_query($con,$sql);
											if(!$result ) {
												die('Could not get data: ' . mysql_error());
											}
											$x=[];
											while($row = mysqli_fetch_array($result)) {
												echo "<tr>
																	<th scope='row'>{$row['ID_MEMBRO']}</th>
																	<td>{$row['nome_funcao']}</td>
																	<td>{$row['NOME']}</td>
																	<td><a href=\"editar_membro_funcao_conselho.php?id=".$row['ID_MEMBRO']."&user-id=".$_ide."\" type='button' class='btn btn-warning'>Editar</a></td>
																	<td><a type='button' class='btn btn-danger' href=\"delete_membro_funcao.php?id=".$row['ID_MEMBRO']."&fkmembro=".$row['FK_ID_FUNCAO']."&user-id=".$_ide."\">Excluir Funcao E membro</a></td>

													</tr>";
												array_push($x,$row['FK_ID_FUNCAO']);
											}
											echo "<input type='hidden' id='str_var' name='str_var' value='<?php print base64_encode(serialize($x)) ?>''>;"
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
							  	"emptyTable": "Não há nenhuma função no conselho gestor",
							  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ entradas",
							  	"infoEmpty": "Mostrando 0 de um total de 0 entradas",
							  	"infoFiltered":   "(filtrado de um total de _MAX_ total entradas)",
						        "infoPostFix":    "",
						        "thousands":      ".",
						        "lengthMenu":     "Mostrar _MENU_ funções",
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

				<br>
			</div>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>