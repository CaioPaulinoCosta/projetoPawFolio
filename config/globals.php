<?php
/* Criação das variáveis globais usadas no projeto. */

  session_start();

  $BASE_URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?") . "/";