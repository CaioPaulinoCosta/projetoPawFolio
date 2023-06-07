<?php

  require_once("models/User.php");
  require_once("models/Message.php");

  class UserDAO implements UserDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
      $this->conn = $conn;
      $this->url = $url;
      $this->message = new Message($url);
    }

    public function buildUser($data) {

    $user = new User();

    $user->userId = $data["userId"];
    $user->name = $data["name"];
    $user->lastname = $data["lastname"];
    $user->email = $data["email"];
    $user->cpf = $data["cpf"];
    $user->password = $data["password"];
    $user-> image= $data["image"];
    $user->adress = $data["adress"];
    $user->birthday= $data["birthday"];
    $user->token = $data["token"];

    return $user;
    }
    public function create(User $user, $authUser = false) {

      $stmt = $this->conn->prepare("INSERT INTO users (
        name, lastname, email, cpf, password, adress, birthday, token
    ) VALUES (
        :name, :lastname, :email, :cpf, :password, :adress, :birthday, :token
    )");    

    $stmt->bindParam("name", $user->name);
    $stmt->bindParam("lastname", $user->lastname);
    $stmt->bindParam("email", $user->email);
    $stmt->bindParam("cpf", $user->cpf);
    $stmt->bindParam("password", $user->password);
    $stmt->bindParam("adress", $user->adress);
    $stmt->bindParam("birthday", $user->birthday);
    $stmt->bindParam("token", $user->token);

    $stmt->execute();

    if($authUser) {
        $this->setTokenToSession($user->token);
      }

    }
    public function update(User $user, $redirect = true) {

    }
    public function verifyToken($protected = false) {

      if(!empty($_SESSION["token"])) {

        // Pega o token da session
        $token = $_SESSION["token"];

        $user = $this->findByToken($token);

        if($user) {
          return $user;
        } else if($protected) {

          // Redireciona usuário não autenticado
          $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");

        }

      } else if($protected) {

        // Redireciona usuário não autenticado
        $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");

      }

    }
    public function setTokenToSession($token, $redirect = true) {

          // Salvar token na session
          $_SESSION["token"] = $token;

          if($redirect) {
    
            // Redireciona para o perfil do usuario
            $this->message->setMessage("Seja bem-vindo!", "success", "index.php");
    
          }

    }
    public function authenticateUser($email, $password) {

      $user = $this->findByEmail($email);

      if($user) {

        // Checar se as senhas batem
        if(password_verify($password, $user->password)) {

          // Gerar um token e inserir na session
          $token = $user->generateToken();

          $this->setTokenToSession($token, false);

          // Atualizar token no usuário
          $user->token = $token;

          $this->update($user, false);

          return true;

        } else {
          return false;
        }

      } else {

        return false;

      }

    }
    public function findByEmail($email) {

      if($email != "") {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

        $stmt->bindParam(":email", $email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $user = $this->buildUser($data);
          
          return $user;

        } else {
          return false;
        }

      } else {
        return false;
      }

    }
    public function findById($id) {

    }
    public function findByToken($token) {

    }
    public function destroyToken() {

    }
    public function changePassword(User $user) {

    }
    
}

