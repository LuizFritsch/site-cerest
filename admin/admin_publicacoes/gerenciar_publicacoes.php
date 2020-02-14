<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciar Publicacoes</title>
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
		include '../../sinan/db_connection.php';
		$con=OpenCon();
		$logado = $_SESSION['login'];
		$func = $_SESSION['func'];
		$senh = $_SESSION['senha'];
		$ide = $_SESSION['id'];
		?>
		<main>
			<div class="content text-justify">
				<h1 id="t" class="text-justify">Gerenciar Publicações</h1>
				<form>
					<div id="divPublicacoes">
						<div class="form-group">
							<hr>
							<a type="button" class="btn btn-success btn-lg btn-block" href="./adicionar_publicacao.php#t">Adicionar Publicação</a>
							<hr>
						</div>
						<br>
						<br>
						<div class="form-group">
							<h6>Pesquisar Publicação:</h6>
							<input type="text" class="form-control" id="inputPesquisarPublicacao" placeholder="Digite o parte do nome da Publicação">
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col" id="tabela-publicacoes">ID</th>
										<th scope="col">Nome da Publicação</th>
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
												die('Could not get data: ' . mysql_error());
											}
											while($row = mysqli_fetch_array($result)) {
												echo "<tr>
																	<th scope='row'>{$row['ID_PUBLICACAO']}</th>
																	<td>{$row['NOME']}</td>
																	<td><a type='button' target='_blank' href='{$row['URL']}' class='btn btn-primary'>Visualizar</a></td>
																	<td><a href='' type='button' class='btn btn-warning'>Editar</a></td>
																		<td><a type='button' class='btn btn-danger' href=\"delete_publicacao.php?id=".$row['ID_PUBLICACAO']."&user-id=".$_ide."\">Excluir</a></td>
													</tr>";
											}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>