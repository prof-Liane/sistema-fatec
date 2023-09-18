<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro</title>
</head>
<body>
	<h1>Cadastre-se</h1>
	<form method="post" action="#">
		<label>Nome:</label>
		<input type="text" name="txtnome" maxlength="45">
		<br>
		<label>E-mail:</label>
		<input type="email" name="txtemail"  maxlength="50">
		<br>
		<label>Senha:</label>
		<input type="password" name="txtsenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#]).{8,16}">
		<br>
		<input type="submit" value="Cadastrar" name="btncadastro">
	</form>
</body>
</html>

<?php

if (!empty($_POST['btncadastro'])) {

	$nome = $_POST['txtnome'];
	$email = $_POST['txtemail'];
	$senha = $_POST['txtsenha'];

	try {
		include 'conexao.php';

	  	$sql = "INSERT INTO cliente(nome_cli, email_cli, senha_cli) VALUES('$nome', '$email', '$senha');";
	 
	  	$conn->exec($sql);
	  	echo "<script>alert('Cadastrado com sucesso!');</script>";
	} catch(PDOException $e) {
	  	echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
}

?>