<?php
	session_start();
if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
		header('location:https://guilherme.cerestoeste.com.br/login.php');
		exit;
	}
	include '../sinan/db_connection.php';
	$con=OpenCon();
	$logado = $_SESSION['login'];
	$func = $_SESSION['func'];
	$senh = $_SESSION['senha'];
	$ide = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<title>Painel Admin Conselho Gestor</title>
	</head>
	<body>
		<?php include '../HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<?php
				echo "<h1 id='t' class='text-justify'>Painel de controle</h1>";
				echo "";
				?>
				<!-- Editable table -->
				<form method="POST" >
					<div class="card">
						<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Conselho gestor do CEREST</h3>
						<div class="card-body">
							<div id="table" class="table-editable">
								<table class="table table-bordered text-center table-hover-cells">
									<thead>
										<tr>
											<?php
												$sql="SELECT * FROM funcoes_conselho";
												$result=mysqli_query($con,$sql);
												if(!$result ) {
													die('Could not get data: ' . mysql_error());
												}
												while($row = mysqli_fetch_array($result)) {
													echo "<th scope='col'>{$row['NOME_FUNCAO']}</th> ";
												}
											?>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												$sql="SELECT * FROM conselho_gestor";
												$result=mysqli_query($con,$sql);
												if(!$result ) {
													die('Could not get data: ' . mysql_error());
												}
												while($row = mysqli_fetch_array($result)) {
													//echo "<td contenteditable='true' name='funcao{$row['FK_ID_FUNCAO']}'>{$row['NOME']}</td>";
													echo "<td><input type='text' class='form-control' name='funcao{$row['FK_ID_FUNCAO']}' value='{$row['NOME']}'></input></td>";
												}
											?>
										</tr>
									</tbody>
								</table>
								<!--<script type="text/javascript">
									for (var i=1;i<5; i++) {
										document.getElementById("funcao".concat(''+i)).addEventListener("input", function() {
											console.log("input event fired");
											}, false);
									}
									
								</script>-->
								<div align="right" style="align-self: right;align-items: right;">
									<button type="submit" class="btn btn-success">Salvar</button>
								</div>
							</div>
						</div>
					</div>
					<?php
						if( $_SERVER['REQUEST_METHOD'] == 'POST'){
							$sql="";
							for ($i=1; $i < 5; $i++) {
								$nome=$_POST['funcao'.$i.''];
								$sql.="UPDATE conselho_gestor SET NOME='$nome' WHERE FK_ID_FUNCAO= $i;";
							}
							if(mysqli_multi_query($con,$sql)){
								echo "<script>Swal.fire(
								'Sucesso!',
								'Os membros do conselho foram atualizados com sucesso!',
								'success'
								)</script>";
							}else{
								echo "<script>Swal.fire({
								icon: 'Erro',
								title: 'Oops...',
								text: 'Não foi possivel alterar os membros do conselho, tente novamente!',
								})</script>";
							}
						}
					?>
					
				</form>
				<!-- Editable table -->
				<br>
			</div>
		</main>
		<?php include '../footer.html'; ?>
	</body>
</html>