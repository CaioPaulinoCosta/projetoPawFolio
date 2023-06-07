<?php

  class Pet {

    public $petId;
    public $name;
    public $breed;
    public $birthday;
    public $weight;
    public $color;
    public $observation;
    public $user_id;

  }
  
  interface PetDAOInterface {
    public function buildPet($data);
    public function create(Pet $pet);
    public function getPetByUserId($id);
    }