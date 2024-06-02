<?php
include ('../config/connection.php');

$id = $_GET['id'];
$sql = "Delete from pedido where idpedido=$id";
if ($conn->query($sql) === TRUE) {
  header("Location:../layout/dashboard.php");
  exit();
} else {
  echo "Error:" . $sql . "<br>" . $conn->error;
}
?>