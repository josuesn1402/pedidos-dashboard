<?php
session_start();
include('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $query = "SELECT * FROM Usuario WHERE NomUsuario = '$username' AND Clave = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['IdUsuario'];
    $_SESSION['username'] = $user['NomUsuario'];

    header("Location: ../layout/dashboard.php");
    exit();
  } else {
    echo "Usuario o contraseña incorrectos";
  }
}
