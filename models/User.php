<?php
// Cria a classe User, possibilitando a utilização de orientação a objetos, separando os métodos que relacionam com o banco de dados com os métodos que não precisam. 

  class User {

    public $userId;
    public $name;
    public $lastname;
    public $email;
    public $cpf;
    public $password;
    public $image;
    public $adress;
    public $birthday;
    public $token;

    public function getFullName($user) {
      return $user->name . " " . $user->lastname;
    }

    public function generateToken() {
      return bin2hex(random_bytes(50));
    }
    
    public function generatePassword($password) {
      return password_hash($password, PASSWORD_DEFAULT);
    }

    public function imageGenerateName() {
      return bin2hex(random_bytes(60)) . ".jpg";
    }

  }

  interface UserDAOInterface {

    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(User $user);

  }