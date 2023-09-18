<?php

$id = $_GET['id'];

try {
  include 'conexao.php';

  $sql = "DELETE FROM cliente WHERE id_cli='$id'";

  $conn->exec($sql);
  
  header('location:cliente.php');

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>