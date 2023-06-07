<?php

include_once("models/Pet.php");
include_once("models/Message.php");

class PetDao implements PetDAOInterface {
    
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
      }

      public function buildPet($data) {

        $pet = new Pet();

        $pet->petId = $data["petId"];
        $pet->name = $data["name"];
        $pet->breed = $data["breed"];
        $pet->birthday = $data["birthday"];
        $pet->weight = $data["weight"];
        $pet->color = $data["color"];
        $pet->observation = $data["observation"];
        $pet->user_id = $data["user_id"];
  
        return $pet;

      }
      public function create(Pet $pet) {

    $stmt = $this->conn->prepare("INSERT INTO pets (
        name, breed, birthday, weight, color, observation, user_id) VALUES (
        :name, :breed, :birthday, :weight, :color, :observation, :user_id
        )");

    $stmt->bindParam(":name",  $pet->name);
    $stmt->bindParam(":breed",  $pet->breed);
    $stmt->bindParam(":birthday",  $pet->birthday);
    $stmt->bindParam(":weight",  $pet->weight);
    $stmt->bindParam(":color",  $pet->color);
    $stmt->bindParam(":observation",  $pet->observation);
    $stmt->bindParam(":user_id",  $pet->user_id);

    $stmt->execute();

    // Mensagem de sucesso por cadastrar um pet
    $this->message->setMessage("Voce cadastrou seu PET com sucesso!", "success", "index.php");

      }

      public function getPetByUserId($id) {
        $pets = [];
  
        $stmt = $this->conn->prepare("SELECT * FROM pets WHERE user_id = :user_id");
  
        $stmt->bindParam(":user_id", $id);
  
        $stmt->execute();
  
        if($stmt->rowCount() > 0) {
  
            $petsArray = $stmt->fetchAll();
  
          foreach($petsArray as $pet) {
            $pets[] = $this->buildPet($pet);
          }
  
        }
  
        return $pets;
      }
}