<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form method="post" action="#">
		<label>E-mail:</label>
		<input type="email" name="txtemail"  maxlength="50">
		<br>
		<label>Senha:</label>
		<input type="password" name="txtsenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#]).{8,16}">
		<br>
		<input type="submit" value="Entrar" name="btnlogin">
	</form>
</body>
</html>

<?php

if (!empty($_POST['btnlogin'])) {

	$email = $_POST['txtemail'];
	$senha = $_POST['txtsenha'];

	try {
		include 'conexao.php';
		
		$select = $conn->prepare("SELECT nome_cli FROM cliente WHERE email_cli='$email' AND senha_cli='$senha'");
		$select->execute();

		if($select->rowCount() == 1){
		    header("location:cliente.php");
	  	}
	} catch(PDOException $e) {
	  	echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
}

?>