<?php

class Contact
{
    private $id;
    private $name;
    private $email;
    private $phone_number;

    public function __construct($id = null, $name = null, $email = null, $phone_number = null ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        return $this->email;
    }
    public function getPhone() {
        return $this->phone_number;
    }

    public function setPhone($phone_number) {
        return $this->phone_number;
    }

    public function toString() {
        return "ID: " . $this->getId() . ", Name: " . $this->getName() . ", Email: " . $this->getEmail() . ", Phone: " . $this->getPhone();
    }

}