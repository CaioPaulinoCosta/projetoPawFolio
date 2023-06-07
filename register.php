<?php 

include_once("templates/header.php");

?>

<div class="wrapper">
  <div class="content">
    <div class="row login-form-row" style="margin: 60px auto;">
    <h1 class="text-center display-2 mt-2">Bem-Vindo!</h1>
    <p class="text-center">Digite suas informações abaixo para se cadastar!</p> 
      <div class="mb-3">
      <form action="<?= $BASE_URL ?>auth_process.php" method="POST" style="max-width: 50%; display: flex; flex-direction: column;  margin: 0 auto;">
      <input type="hidden" name="type" value="register">
  <div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" id="email"placeholder="Digite seu e-mail...">
    <div id="emailHelp" class="form-text">Nós não vamos compartilhar seu email com mais ninguém.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nome:</label>
    <input type="text" class="form-control" name="name" id="name"placeholder="Digite seu nome...">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Sobrenome:</label>
    <input type="text" class="form-control" name="lastname" id="lastname"placeholder="Digite seu sobrenome...">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CPF:</label>
    <input type="text" class="form-control" name="cpf" id="cpf"placeholder="Digite seu sobrenome...">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha:</label>
    <input type="password" class="form-control" name="password" id="password"placeholder="Digite sua senha...">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirme sua senha:</label>
    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"placeholder="Confirme sua senha...">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Data de nascimento:</label>
    <input type="date" class="form-control" name="birthday" id="birthday">
  </div>

  <button type="submit" class="btn btn-secondary" value="Registrar">Cadastrar</button>
</form>
  </div>
  </div>
  </div>
<?php 

include_once("templates/footer.php");

?>