<?php

class Contact
{
    private $id;
    private $name;
    private $email;
    private $phone_number;

    public function __construct($id, $name, $email, $phone_number) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPhone() {
        return $this->phone_number;
    }

    public function setPhone($phone_number) {
        $this->phone_number = $phone_number;
    }

    public function toString() {
        return "ID: " . $this->getId() . ", Name: " . $this->getName() . ", Email: " . $this->getEmail() . ", Phone: " . $this->getPhone();
    }

}