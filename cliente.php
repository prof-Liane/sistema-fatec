<?php

try {
		include 'conexao.php';
		
		$select = $conn->prepare("SELECT * FROM cliente");
		$select->execute();
?>

		<table border='1'>
			<tr>
				<th>ID</th>
				<th>Cliente</th>
				<th>E-mail</th>
				<th colspan="2">Ações</th>
			</tr>
	
	<?php while($cliente = $select->fetch()){ ?>
	
		    <tr>
		    	<td> <?php echo $cliente['id_cli']; ?></td>
		    	<td> <?php echo $cliente['nome_cli']; ?></td>
		    	<td> <?php echo $cliente['email_cli']; ?></td>
		    	<td><a href="editar.php?id=<?php echo $cliente['id_cli']; ?>">Editar</a></td>
		    	<td><a href="excluir.php?id=<?php echo $cliente['id_cli']; ?>">Excluir</a></td>
		    </tr>
	<?php } ?>
		</table>
<?php	  	
	} catch(PDOException $e) {
	  	echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;


?>