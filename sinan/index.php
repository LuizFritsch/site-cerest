<?php/* na primeira linha usaremos o “action=ope.php” para que o formulário repasse
as informações para a página ope.php */?>
<form method="post" action="ope.php" id="formlogin" name="formlogin" >
	<fieldset id="fie">
		<legend>LOGIN</legend><br />
		<label>NOME : </label>
		<?php
		// o campo “name” dentro do input e importante,
		// pois será ele que armazenará os dados digitados .?>
		<input type="text" name="login" id="login"  /><br />
		<label>SENHA :</label>
		<input type="password" name="senha" id="senha" /><br />
		<input type="submit" value="LOGAR  "  />
	</fieldset>
</form>