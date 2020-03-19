<?php include 'HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Popular tabela cidade e municipios</title>
	</head>
	<body>
		<main>
			<?php
				if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
					echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
					echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
				}else{
					//le os dados do arquivo json
					$data = file_get_contents('estados_cidades.json');
					//converte objeto json pra array associativo do php
					$dados = json_decode($data, true);
					$sigla=$dados[0].['cidades'][1][1];
					echo count($dados);
					/*
					for ($i=0; $i < count($dados); $i++) { 
						echo $data[$i];
						foreach ($sigla as $data[$i].sigla) {
							echo $sigla;
						}
					}*/
					include './database/db_connection.php';
					$con=OpenCon();
					print_r($dados[0]['sigla']);
					print_r($dados[0]['nome']);
					print_r($dados[0]['cidades'][0]);
					echo "<br>";
					echo "<br>";
					echo "<br>";
					echo "<br>";
					for ($i=0; $i < count($dados); $i++) { 
						//echo "<br>";
						//print_r($dados[$i]['nome']);
						echo "<br>";

						$estado=$dados[$i]['nome'];
						$sql="INSERT INTO estado(ID, NOME) VALUES(DEFAULT,'$estado')";
						print_r($sql);
						echo "<br>";
						mysqli_query($con, $sql);

						$sql_estado="SELECT ID FROM estado WHERE NOME LIKE '$estado'";
						print_r($sql_estado);
						echo "<br>";
						$res=mysqli_query($con, $sql_estado);
						$row=mysqli_fetch_assoc($res);
						$id_estado=$row['ID'];



						for ($j=0; $j < count($dados[$i]['cidades']); $j++) { 
							//print_r('->'.$dados[$i]['cidades'][$j]);
							//echo "<br>";

							$cidade=$dados[$i]['cidades'][$j];
							$sql2="INSERT INTO municipio(ID,NOME,FK_ID_ESTADO) VALUES (DEFAULT, '$cidade', '$id_estado')";
							print_r($sql2);
							echo "<br>";

							mysqli_query($con, $sql2);
						}
						//echo "<br>";
						//echo "<br>";
					}

					echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t');</script>";

				}
				
			?>
		</main>
	</body>
</html>