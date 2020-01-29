<?php
	include "DatabaseFactory.php";
	$DBFactory = new DatabaseFactory();
	$Database = $DBFactory->getConnection();
	$query = "SELECT nome FROM usuarios WHERE ID_USUARIO = 1"; // your query
	$result = $Database->select($query);
	
	echo "<h1>$result<h1>";
?>