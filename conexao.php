<?php
  $servername = "localhost";
  $username = "root";
  $password = "usbw";
  $dbname = "sistema";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Banco conectado";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>