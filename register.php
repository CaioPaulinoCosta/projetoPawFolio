<?php

    include_once("templates/header.php")

?>

<div class="container-fluid">
<form class="w-25 p-5">
    <h2>Cadastre-se</h2>
  <div class="mb-3">
    <label class="form-label">Nome:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>

  <div class="mb-3">
  <label class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Não compartilharemos sua senha com ninguém!</div>
  </div>

  <div class="mb-3">
    <label class="form-label">CPF:</label>
    <input type="text" class="form-control" id="cpf" name="cpf">
  </div>

  <div class="mb-3">
    <label class="form-label">Password: </label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="mb-3">
    <label class="form-label">Confirme sua senha: </label>
    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
  </div>

  <div class="mb-3">
    <label class="form-label">Endereço:</label>
    <input type="text" class="form-control" id="adress" name="adress">
  </div>

  
  <div class="mb-3">
    <label class="form-label">Data de nascimento:</label>
    <input type="date" class="form-control" id="birthday" name="birthday">
  </div>
  <div class="d-grid gap-2">
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</div>

<?php

    include_once("templates/footer.php")

?>