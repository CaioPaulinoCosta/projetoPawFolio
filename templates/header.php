<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();

if (!empty($flassMessage["msg"])) {
  // Limpar a mensagem
  $message->clearMessage();
}

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(false);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PawFolio</title>
  <!-- CSS do projeto -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand ps-5" href="index.php"><img class="img-fluid" src="img/logo.png" width="70px" height="70px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php if ($userData) :
          if ($userData->image == "") {
            $userData->image = "user.jpg";
          } ?>

          <div class="collapse navbar-collapse justify-content-end pe-5" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link pt-3  ps-5" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link pt-3  ps-5" href="#">Serviços</a>
              </li>
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pt-3  ps-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Funções
          </a>
          <ul class="dropdown-menu bg-dark">
            <li><a class="dropdown-item" href="schedule_services.php">Agendar Serviços</a></li>
            <li><a class="dropdown-item" href="register_pet.php">Cadastrar Pet</a></li>
          </ul>
        </li>
            </ul>
            <a class="nav-link ps-5" href="<?= $BASE_URL ?>editprofile.php">
              <div id="navbarUserImg" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>');"></div>
            </a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link pt-3 ps-5" href="logout.php">Sair</a>
              </li>
            </ul>
          <?php else : ?>
            <ul class="navbar-nav pe-5">
              <li class="nav-item">
                <a class="nav-link pt-3 ps-5" href="login.php">Login</a>
              </li>
            </ul>
          <?php endif; ?>
          </div>
      </div>
    </nav>
  </header>
  <?php if (!empty($flassMessage["msg"])) : ?>
    <div class="msg-container">
      <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
  <?php endif; ?>

  <?php
  require_once("templates/footer.php");
  ?>