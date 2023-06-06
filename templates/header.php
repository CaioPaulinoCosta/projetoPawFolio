<?php

    include_once("config/conect.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Css do projeto -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Pawfolio</title>
</head>

<body>

    <header>
        <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                <img src="imgs/logopawfoliomenor.png" alt="PawFolio" width="70" height="70">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active"href="#">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active"href="#">SERVIÇOS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active"href="#">CONTATO</a>
                  </li>
                </ul>
                <div> 
                    <a href="">
                    <button class="btn btn-custom" id="btn-login">ENTRAR</button>
                    </a>
                    </div>
                    <div class="ps-5">
                        <a href="register.php">
                    <button class="btn btn-custom" id="btn-register">CADASTRE-SE</button>
                        </a>
                    </div>
              </div>
            </div>
          </nav>
        </div>
    </header>