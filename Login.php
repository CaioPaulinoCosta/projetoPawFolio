<?php

    include_once("templates/header.php")

?>

<div class="container-fluid">
<form class="w-25 p-5" action="<?= $BASE_URL ?>auth_process.php"  method="POST">
<input type="hidden" name="type" value="login">
    <h2>Cadastre-se</h2>

  <div class="mb-3">
    <label class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="mb-3">
    <label class="form-label">Senha:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="d-grid gap-2">
  <input type="submit" class="btn btn-primary" value="Cadastrar">
  </div>
</form>
</div>

<?php

    include_once("templates/footer.php")

?>