<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Editar Função e Membro</title>
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
			$id=$_GET['id'];
		?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Editar Função e membro do conselho Gestor</h1>
				<form method="POST" enctype="multipart/form-data">	
						<?php
							if (mysqli_connect_errno()) {
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$sql="SELECT conselho_gestor.ID_MEMBRO, conselho_gestor.NOME, conselho_gestor.FK_ID_FUNCAO, funcoes_conselho.nome_funcao FROM conselho_gestor INNER JOIN funcoes_conselho on conselho_gestor.ID_MEMBRO='$id' AND conselho_gestor.FK_ID_FUNCAO=funcoes_conselho.ID_FUNCAO_CONSELHO" ;
							$result = mysqli_query($con,$sql);
							$row = mysqli_fetch_assoc($result);
						?>
						<div class="form-group">
							<h6>Função</h6>
							<input type="text" class="form-control" name="funcao" id="funcao" value="<?php echo (isset($row['nome_funcao']))?$row['nome_funcao']:'';?>">
						</div>
						<div class="form-group">
							<h6>Nome do Membro do conselho</h6>
							<input type="text" class="form-control" name="membro" id="membro" value="<?php echo (isset($row['NOME']))?$row['NOME']:'';?>">
						</div>
						<br>

						<div class="form-group">
							<hr>
								<button type="submit" class="btn btn-success btn-block btn-lg btn-block">Salvar alterações</button>
							<hr>
						</div>
						

					</form>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$sqil="UPDATE conselho_gestor,funcoes_conselho SET conselho_gestor.NOME='{$_POST['membro']}',funcoes_conselho.nome_funcao='{$_POST['funcao']}' WHERE conselho_gestor.ID_MEMBRO='$id' AND funcoes_conselho.ID_FUNCAO_CONSELHO='{$row['FK_ID_FUNCAO']}'";
							if ($resultSa = mysqli_query($con, $sqil)) {
								echo "<script>Swal.fire(
										'Sucesso!',
								        'Edição efetuada com sucesso!',
								        'success'
								      ).then(function() {
								      		window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php';
								      });</script>";	
							}else{
								echo "$resultSa";
								echo "<script>Swal.fire({
										icon: 'error',
								        title: 'Oops...',
								        text: 'Não foi possivel editar, tente novamente mais tarde!',
								      }).then(function() {
								      		window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php'
								      });</script>";							            			
							}
						}						
					?>
					

			</div>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>