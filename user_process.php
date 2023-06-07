<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

// Pega o tipo do formulario
$type = filter_input(INPUT_POST, "type");

// Atualiza o usuario
if ($type === "update") {

    // Pega dados do usuario
    $userData = $userDao->verifyToken();

    // Recebe dados do POST
    $bio = filter_input(INPUT_POST, "bio");

    // Cria novo objeto de usuario
    $user = new User();

    // Preenche os dados do usuario
    $userData->bio = $bio;

    // Upload da imagem de usuario
    if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
        $image = $_FILES["image"];
        $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg", "image/jpg"];

        // Checagem de tipo de imagem
        if (in_array($image["type"], $imageTypes)) {
            if (in_array($image["type"], $jpgArray)) {
                $imageFile = imagecreatefromjpeg($image["tmp_name"]);
            } else {
                if (getimagesize($image["tmp_name"]) !== false) {
                    $imageFile = imagecreatefrompng($image["tmp_name"]);
                } else {
                    $message->setMessage("Arquivo PNG inválido!", "error", "index.php");
                }
            }

            if ($imageFile) {
                $imageName = $user->imageGenerateName();
                imagejpeg($imageFile, "./img/users/" . $imageName, 100);
                $userData->image = $imageName;
            }
        } else {
            $message->setMessage("Tipo inválido de imagem, insira png ou jpg!", "error", "index.php");
        }
    }
    $userDao->update($userData);
}
