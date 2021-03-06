<?php include '../HEADER.php'; ?>
<?php
include '../database/db_connection.php';
$con=OpenCon();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Agenda de Fisioterapia</title>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="../style/style.css">
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
				<table class="table table-striped" id="example">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Segunda</th>
							<th scope="col">Terça</th>
							<th scope="col">Quarta</th>
							<th scope="col">Quinta</th>
							<th scope="col">Sexta</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">7:30</th>
							<?php
								//SELECT NOME_COMPLETO FROM paciente inner join usuario_comum where paciente.FK_ID_USUARIO_COMUM=usuario_comum.ID and paciente.ID>7745 AND paciente.ID<7749
								
							?>
						</tr>
						<tr>
							<th scope="row">8:00</th>
						</tr>
						<tr>
							<th scope="row">8:30</th>
						</tr>
						<tr>
							<th scope="row">9:00</th>	
						</tr>
						<tr>
							<th scope="row">9:30</th>	
						</tr>
						<tr>
							<th scope="row">10:00</th>	
						</tr>
						<tr>
							<th scope="row">10:30</th>	
						</tr>
						<tr>
							<th scope="row">11:00</th>	
						</tr>
						<tr>
							<th scope="row">11:30</th>	
						</tr>
					</tbody>
				</table>
				<script type="text/javascript">
						$(document).ready(function() {
							$('#example').dataTable();
						} );
					</script>
					<script type="text/javascript">
						$('#example').dataTable( {
							"language": {
							  	"emptyTable": "Não há nenhum paciente",
							  	"info": "Mostrando _START_ de _END_ de um total de _TOTAL_ entradas",
							  	"infoEmpty": "Mostrando 0 de um total de 0 entradas",
							  	"infoFiltered":   "(filtrado de um total de _MAX_ total entradas)",
						        "infoPostFix":    "",
						        "thousands":      ".",
						        "lengthMenu":     "Mostrar _MENU_ pacientes",
							  	"loadingRecords": "Carregando...",
						        "processing":     "Processando...",
						        "search":         "Buscar:",
							  	"searchPlaceholder": "Filtre por qualquer coisa aqui...",
						        "zeroRecords":    "Não há dados",
							    "paginate": {
							      "first":      "Primeira",
				            	  "last":       "Última",
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
			</div>
		</main>
		<?php include '../footer.html'; ?>
	</body>
</html>