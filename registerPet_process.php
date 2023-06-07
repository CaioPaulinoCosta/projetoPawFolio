<?php 

  require_once("globals.php");
  require_once("db.php");
  require_once("models/Message.php");
  require_once("models/Pet.php");
  require_once("dao/UserDAO.php");
  require_once("dao/PetDAO.php");

  $message = new Message($BASE_URL);
  $userDao = new UserDAO($conn, $BASE_URL);
  $petDao = new PetDAO($conn, $BASE_URL);

// Pega o tipo do formulario
$type = filter_input(INPUT_POST, "type");

// Resgata dados do usuario
$userData = $userDao->verifyToken();

if($type === "register_pet") {

    // Recebe dados do input
    $name = filter_input(INPUT_POST, "name");
    $breed = filter_input(INPUT_POST, "breed");
    $birthday = filter_input(INPUT_POST, "birthday");
    $weight = filter_input(INPUT_POST, "weight");
    $color = filter_input(INPUT_POST, "color");
    $observation = filter_input(INPUT_POST, "observation");

    $pet = new Pet();

    // Valida dados minimos
    if(!empty($name) && !empty($breed) && !empty($birthday) && !empty($weight) && !empty($color)) {

    $pet->name = $name;
    $pet->breed = $breed;
    $pet->birthday = $birthday;
    $pet->weight = $weight;
    $pet->color = $color;
    $pet->observation = $observation;
    $pet->user_id = $userData->userId;

    $petDao->create($pet);

    } else {

    $message->setMessage("Você precisa ao menos adicionar: Nome, Raca, Data de Nascimento, Peso e a cor do pet!", "error", "back");

    }

}