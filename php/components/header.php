<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital@0;1&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="roboto-regular">
  <header>
    <div class="header-left">
      <button id="toggleSidebar">
        <img src="../../assets/svg/bars-3.svg" alt="☰">
      </button>
      <h1 class="nunito">Administrar Pedidos</h1>
    </div>
    <div class="profile">
      <?php
      if (isset($_SESSION['username'])) {
        echo '<span>' . $_SESSION['username'] . '</span>';
      } else {
        echo '<span>nombre</span>';
      }
      ?>
      <div>
        <img src="../../assets/svg/user-person-profile.svg" alt="perfil">
        <!-- <img src="../../assets/svg/arrow-down.svg" alt="abrir"> -->
      </div>
    </div>
  </header>
  <main>