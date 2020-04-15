<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adicionar Eventos</title>
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>

		<!--  jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

		<!-- Bootstrap Date-Picker Plugin -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

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
				<h1 id="t" class="text-center">Adicionar Eventos</h1>
				
				<form method="POST">
					
					<!--NOME-->
					<div class="form-group">
						<h6>Nome do evento</h6>
						<input type="text" class="form-control" id="inputNomeEvento" placeholder="Digite o nome do evento...">
					</div>

					<!--DESCRICAO-->
					<div class="form-group">
						<h6>Descricao do evento</h6>
						<input type="text" class="form-control" id="inputDescricaoEvento" placeholder="Digite a descricao do evento...">
					</div>

					<!--DATA INICIO-->
					<div class="form-row">
						<div class="form-group col-md-6">
							<h6>Data Inicio:</h6>
							<input type='text' data-date-format="dd/mm/yyyy" value="<?php echo date("d-m-Y"); ?>" class="form-control" id="dataInicio" />
							<?php
								$var=date("d-m-Y");
								echo "$var";
							?>
						</div>
						<div class="form-group col-md-6">
							<h6>Data Fim:</h6>
							<input type='text' data-date-format="dd/mm/yyyy" value="<?php echo date("d-m-Y"); ?>" class="form-control" id="dataFim" />
						</div>
					</div>
					
					<script>
					  $( function() {
					    var dateFormat = "mm/dd/yy",
					      from = $( "#dataInicio" )
					        .datepicker({
					          defaultDate: "+1w",
					          changeMonth: true,
					          numberOfMonths: 1
					        })
					        .on( "change", function() {
					          to.datepicker( "option", "minDate", getDate( this ) );
					        }),
					      to = $( "#dataFim" ).datepicker({
					        defaultDate: "+1w",
					        changeMonth: true,
					        numberOfMonths: 1
					      })
					      .on( "change", function() {
					        from.datepicker( "option", "maxDate", getDate( this ) );
					      });
					 
					    function getDate( element ) {
					      var date;
					      try {
					        date = $.datepicker.parseDate( dateFormat, element.value );
					      } catch( error ) {
					        date = null;
					      }
					 
					      return date;
					    }
					  } );
					  </script>
						
					<script type="text/javascript">
						$('#dataInicio').datepicker();
					</script>
					<script type="text/javascript">
						$('#dataFim').datepicker();
					</script>
					

					<!--DATA 
					<div class='input-group date' id='datetimepicker2'>
	                    <label>Data Fim:</label>
	                    <input type='text' data-date-format="DD-MM-YYYY" class="form-control" />
	                    <span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>FIM-->

					<!--INSCRICOES ABERTAS-->
					<input type='hidden' name="statusInscricoes" id="statusInscricoes" value="1" class="form-control" />
				</form>

				<br>
			</div>

			

		</main>		
		<?php include '../../footer.html'; ?>
	</body>
</html>