<?php
  require_once("templates/header.php");

  // Verifica se usuário está autenticado
  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  $user = new User();
  $userDao = new UserDao($conn, $BASE_URL);

  $userData = $userDao->verifyToken(true);

?>
<div class="container-fluid register-pet">
<div class="container w-50">
  <div class="row p-5">
    <div class="col register-pet-form bg-white p-5">
<form action="<?= $BASE_URL ?>registerPet_process.php" method="POST">
      <input type="hidden" name="type" value="register_pet">

  <div class="mb-3">
    <label class="form-label">Nome:</label>
    <input type="text" class="form-control" name="name" id="name"placeholder="Digite seu nome...">
  </div>

  <div class="mb-3">
    <label class="form-label">Raca:</label>
    <input type="text" class="form-control" name="breed" id="breed"placeholder="Digite seu nome...">
  </div>
  
  <div class="mb-3">
    <label class="form-label">Data de nascimento:</label>
    <input type="date" class="form-control" name="birthday" id="birthday"placeholder="Digite seu nome...">
  </div>

  <div class="mb-3">
    <label class="form-label">Peso:</label>
    <input type="text" class="form-control" name="weight" id="weight"placeholder="Digite seu nome...">
  </div>

  <div class="mb-3">
    <label class="form-label">Cor:</label>
    <input type="text" class="form-control" name="color" id="color"placeholder="Digite seu nome...">
  </div>

  <div class="mb-3">
    <label class="form-label">Observacao:</label>
    <input type="text" class="form-control" name="observation" id="observation"> 
  </div>
  <div class="d-grid gap-2">
  <input type="submit" class="btn btn-dark" value="Registrar"></input>
  </div>
</form>
</div>
</div>
</div>
</div>
<?php
        require_once("templates/footer.php");
?>