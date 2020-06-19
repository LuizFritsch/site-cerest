<?php include 'HEADER.php'; ?>
<?php
include './database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fisioterapia</title>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="./style/style.css">
		<!--<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>-->
		
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
										<th scope="col">Ocupação</th>
										<th scope="col">Data de Nascimento</th>
									</tr>
								</thead>
								<tbody>
									<?php
										try {
											$sql="SELECT * FROM paciente inner join usuario_comum where paciente.FK_ID_USUARIO_COMUM=usuario_comum.ID";
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

				<br>

			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>