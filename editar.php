<?php

$id = $_GET['id'];

try {
		include 'conexao.php';
		
		$select = $conn->prepare("SELECT * FROM cliente WHERE id_cli='$id'");
		$select->execute();

		if($select->rowCount() == 1){
		    if($cliente = $select->fetch()){

?>
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
		<label>ID:</label>
		<input type="text" name="txtid" value="<?php echo $cliente['id_cli']; ?>" disabled>
		<br>
		<label>Nome:</label>
		<input type="text" name="txtnome" maxlength="45" value="<?php echo $cliente['nome_cli']; ?>">
		<br>
		<label>E-mail:</label>
		<input type="email" name="txtemail"  maxlength="50"value="<?php echo $cliente['email_cli']; ?>" value="<?php $cliente['nome_cli']; ?>">
		<br>
		<label>Senha:</label>
		<input type="password" name="txtsenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#]).{8,16}" value="<?php echo $cliente['senha_cli']; ?>">
		<br>
		<input type="submit" value="Atualizar" name="btnatualizar">
	</form>
</body>
</html>

<?php

			}
	  	}
	} catch(PDOException $e) {
	  	echo $sql . "<br>" . $e->getMessage();
	}

	if (!empty($_POST['btnatualizar'])) {

		$nome = $_POST['txtnome'];
		$email = $_POST['txtemail'];
		$senha = $_POST['txtsenha'];

		try {
		  $sql = "UPDATE cliente SET nome_cli='$nome', email_cli='$email', senha_cli='$senha' WHERE id_cli='$id'";

		  // Prepare statement
		  $update = $conn->prepare($sql);

		  // execute the query
		  $update->execute();

		  // echo a message to say the UPDATE succeeded
		  echo $update->rowCount();
		  header('location:cliente.php');

		} catch(PDOException $e) {
		  echo $sql . "<br>" . $e->getMessage();
		}
	}

	$conn = null;

?>