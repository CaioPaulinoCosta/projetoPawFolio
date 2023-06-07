<?php

include_once("templates/header.php");

?>
<div class="wrapper">
  <div class="content">
    <div class="row login-form-row" style="margin: 60px auto;">
      <h1 class="text-center display-2 mt-2">Bem-Vindo!</h1>
      <p class="text-center">Digite suas informações abaixo para acessar a página!</p>
      <div class="mb-3">
        <form action="<?= $BASE_URL ?>auth_process.php" method="POST" style="max-width: 50%; display: flex; flex-direction: column;  margin: 0 auto;">
          <input type="hidden" name="type" value="login">
          <div class="mb-3  mt-5">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail...">
          </div>

          <div class="mb-3 mt-5">
            <label for="exampleInputPassword1" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha...">
          </div>
          <button type="submit" class="btn btn-secondary  mt-2" value="Entrar">Entrar</button>
          <p class="mt-2">Ainda não tem um login? <a href="<?= $BASE_URL ?>register.php">Clique aqui<a> para se cadastrar!</p>
        </form>
      </div>
    </div>
  </div>
  <?php

  include_once("templates/footer.php");

  ?>