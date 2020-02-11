<?php include 'HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Publicações do CEREST OESTE</h1>
				<?php
					/**$sql = "SELECT * FROM publicacoes";
					$arrayFuncoes = array();
					$sql="SELECT * FROM funcoes_conselho";
					$result=mysqli_query($con,$sql);
					if(!$result) {
						die('Não foi possivel selecionar as publicações: ' . mysql_error());
					}
					//Exibe todas as publicacoes
					while($row = mysqli_fetch_array($result)) {
						//
						echo "
							 <div class='responsive text-center'>
								<embed src='./publicacoes/artigo aviação agricola.pdf' class='pdf' type='application/pdf'>
							 </div>";
						array_push($arrayFuncoes,"<h6>{$row['NOME_FUNCAO']}:</h6>");
					
					}**/
				?>
				<div class="responsive text-center">
					<embed src="./publicacoes/artigo aviação agricola.pdf" class="pdf" type="application/pdf">
				</div>
				<div class="responsive text-center">
					<embed src="./publicacoes/artigo aviação agricola.pdf" class="pdf" type="application/pdf">
				</div>
				<div class="responsive text-center">
					<embed src="./publicacoes/artigo aviação agricola.pdf" class="pdf" type="application/pdf">
				</div>
				<br>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>