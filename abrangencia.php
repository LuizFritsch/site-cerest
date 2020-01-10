<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<title>Abrangência</title>
</head>
<body>
<?php include 'header.html'; ?>
<main>
	<div class="content text-break">

		<h1 class="text-justify">Abrangência do CEREST OESTE:</h1>

		<p class="text-justify"></p>

		<div class="abrangencia text-center">
			<img alt="mapa de abrangencia do cerest oeste" src="./img/mapaAbrangencia.png" class="zoom responsive img-fluid">
			<p class="text-center descricaoImagem"><strong>Mapa de abrangência do CEREST OESTE.</strong></p>
		</div>

		<p>
			<strong>
				Núcleos Municipais em Saúde do Trabalhador:
			</strong>
		</p>
		<!--
		<div id="class1" class="image-container">
		    <button class="">An image</button>
		    <a href="">An Image</a>
		</div>
		<div id="class1-container" class="text-container">
		    <p>Some Content1</p>
		</div>

		 <div id="class2" class="image-container">
		    <a href="">An Image</a>
		 </div>
		 <div id="class2-container" class="text-container">
		     <p>Some Content2</p>
		 </div>-->
		 <div class="row">
		   <div class="col-4">
		     <div class="list-group" id="list-tab" role="tablist">
		       <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Alegrete</a>
		       <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Barra do Quaraí</a>
		       <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Itaqui</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Maçambará</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Quaraí</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Rosário do Sul</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Santa Margarida do Sul</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Santana do Livramento</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">São Gabriel</a>
		       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Uruguaiana</a>

		     </div>
		   </div>
		   
		   <div class="col-8">
		     <div class="tab-content" id="nav-tabContent">
		       <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
		       	<p><strong>Contato:</strong></p>
		       	<p>Telefone: <a href="tel:+555534227778">+55 55 3422-7778</a></p>
		       	<p>Email: <a href="mailto:oestecerest@gmail.com">oestecerest@gmail.com</a></p>
		       </div>
		       <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
		       <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
		       <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
		     </div>
		   </div>
		 </div>
		 <p></p>
	</div>
</main>
<?php include 'footer.html'; ?>
<script type="text/javascript">
	$('.image-container').click(function() {
	     $('.text-container').not($(this).next()).hide(200);
	     $(this).next('.text-container').toggle(400);
	});
</script>
</body>
</html>