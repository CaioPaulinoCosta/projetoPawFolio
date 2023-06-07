<?php
require_once("templates/header.php");

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("dao/PetDAO.php");
$user = new User();

$userDao = new UserDao($conn, $BASE_URL);
$petDao = new PetDao($conn, $BASE_URL);


$userData = $userDao->verifyToken(true);

$fullName = $user->getFullName($userData);


$userPets = $petDao->getPetByUserId($userData->userId);

if ($userData->image == "") {
  $userData->image = "user.jpg";
}


?>
<div class="container-fluid editprofile">
  <div class="container p-4">
    <div class="row profile-row bg-white">
      <div class="col-4 p-5">
        <div id="editprofile-user-img" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>'); position: relative;">
          <i class="fa-sharp fa-solid fa-user-pen" style="position: absolute; bottom: 0; right: 0; font-size: 30px;color: #842029;"></i>
          <input type="file" name="image" style="position: absolute; bottom: 0; right: 0; opacity: 0;">
        </div>
        <h4 class="pt-3"><?= $fullName ?></h4>
      </div>
      <div class="col-8">
        <h3 class="text-center pt-4">Meus pets cadastrados</h3>
        <div id="table-title-bottom-border"></div>
        <div class="p-4">
        <?php if(empty($userPets)): ?>          
         <p class="text-center">Você ainda não cadastrou nenhum pet. <a class="text-dark" href="register_pet.php"><spann>Clique aqui </spann></a>para cadastrar seu primeiro pet!</p>
          <?php else: ?>
        <table class="table">
        <thead class="text-center">
          <th scope="col">Nome</th>
          <th scope="col">Raça</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Peso</th>
          <th scope="col">Observação</th>
        </thead>
        <tbody>
          <?php foreach($userPets as $pet): ?>
          <tr class="text-center">
            <td scope="row"><?= $pet->name ?></td>
            <td scope="row"><?= $pet->breed ?></td>
            <td scope="row"><?= $pet->birthday ?></td>
            <td scope="row"><?= $pet->weight ?></td>
            <td scope="row"><?= $pet->observation ?></td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once("templates/footer.php");
?>