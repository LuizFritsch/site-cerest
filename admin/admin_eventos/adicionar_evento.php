<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adicionar Evento</title>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
		<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



		<!-- Bootstrap Date-Picker Plugin -->

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
				<h1 id="t" class="text-center">Criar Evento</h1>
				
				<form method="POST" action="" id="form-criar-evento">
					
					<!--NOME-->
					<div class="form-group">
						<h6>Nome do evento</h6>
						<input type="text" class="form-control" id="nomeEvento" placeholder="Digite o nome do evento...">
					</div>

					<!--DESCRICAO-->
					<div class="form-group">
						<h6>Descricao do evento</h6>
						<input type="text" class="form-control" id="descricaoEvento" placeholder="Digite a descricao do evento...">
					</div>

					<!--DATA INICIO-->
					<div class="form-row">
						<div class="form-group col-md-6">
							<h6>Data Inicio:</h6>
							<input type='text' data-date-format="dd/mm/yyyy" value="<?php echo date("d/m/Y"); ?>" class="form-control" id="dataInicio" name="dataInicio" />
						</div>
						<div class="form-group col-md-6">
							<h6>Data Fim:</h6>
							<input type='text' data-date-format="dd/mm/yyyy" value="<?php echo date("d/m/Y"); ?>" class="form-control" id="dataFim" name="dataFim" />
						</div>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							var regex="/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/";
							$("#dataInicio").change(function() {
								if (!$("#dataInicio").val().match(regex)) {
									 $("#dataInicio").css("border-color: red");
								}
							});
							$("#dataFim").change(function() {
								if (!$("#dataFim").val().match(regex)) {
									 $("#dataFim").css("border-color: red");
								}
							});
						});
					</script>
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
					
					<script type="text/javascript">
						function FormataStringData(data) {
						  var dia  = data.split("/")[0];
						  var mes  = data.split("/")[1];
						  var ano  = data.split("/")[2];

						  return ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-2);
						  // Utilizo o .slice(-2) para garantir o formato com 2 digitos.
						}
						function comparaDatas(date1,date2){
						     if (date1>date2) return true;
						     else return false;
						}
  						$( document ).ready(function() {
							$("#form-criar-evento").submit(function(){
								var nomeEvento=$("#nomeEvento").val();
								var descricaoEvento=$("#descricaoEvento").val();
								var dataInicio=$("#dataInicio").val();
								var dataFim=$("#dataFim").val();
								var nmrVagas=$("#nmrVagas").val();
								var dtIni = new Date(FormataStringData(dataInicio));
								var dtFim = new Date(FormataStringData(dataFim));
								

								if (!nomeEvento || !descricaoEvento || !dataFim || !dataInicio) {

									Swal.fire(
											'Erro!',
											'Nao foi possivel criar o evento, ha campos em branco!',
											'error'
										);

								}else{
									if (comparaDatas(dtIni,dtFim)) {
										Swal.fire(
												'Erro!',
												'data final é anterior a data de inicio!',
												'error'
											);
									}else{
										$.ajax({
						                    url:'../../database/criar_evento.php',
						                    method:'POST',
						                    data:{
						                       nomeEvento:nomeEvento,
						                       descricaoEvento:descricaoEvento,
						                       dataInicio:dataInicio,
						                       dataFim:dataFim,
						                       nmrVagas:nmrVagas,
						                       statusInscricoes:1
						                    },
						                    success:function(response){
						                        Swal.fire(
													'Sucesso!',
													'O evento foi criado com sucesso!',
													'success'
												).then(function() {
													window.location.href= "./gerenciar_eventos.php";
												});
						                    },
						                    error:function(response) {
						                    	Swal.fire(
													'Erro!',
													'Nao foi possivel criar o evento!',
													'error'
												).then(function() {
													location.reload();
												});	
						                    }
						                });
									}
									
								}								
								return false;
							});
						});
					</script>

					<!--INSCRICOES ABERTAS-->
					<input type='hidden' name="statusInscricoes" id="statusInscricoes" value="1" class="form-control" />
					<h6>Vagas</h6>
					<div class="input-group number-spinner">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
						</span>
						<input type="number" pattern="\d*" name="nmrVagas" id="nmrVagas" class="form-control text-center" value="1">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
						</span>
					</div>
					<br>
					<br>
					<br>
					<script type="text/javascript">
						$(document).on('click', '.number-spinner button', function () {    
							var btn = $(this),
								oldValue = btn.closest('.number-spinner').find('input').val().trim(),
								newVal = 0;
							
							if (btn.attr('data-dir') == 'up') {
								newVal = parseInt(oldValue) + 10;
							} else {
								if (oldValue > 1) {
									newVal = parseInt(oldValue) - 10;
								} else {
									newVal = 1;
								}
							}
							btn.closest('.number-spinner').find('input').val(newVal);
						});
					</script>
					<div class="form-group">
						<button type="submit" id="save" name="save" class="btn btn-success btn-lg btn-block btn-lg btn-block save">Criar Evento</button>
					</div>

					<br>

				</form>
				
				<br>
			</div>

			

		</main>		
		<?php include '../../footer.html'; ?>
	</body>
</html>