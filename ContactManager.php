<?php
require_once 'DBConnect.php';
require_once 'Contact.php';
class ContactManager
{

    private $db;
    public function __construct()
    {
        $this->db = DBConnect::getPDO();
    }

    public function findAll() {
        $query = $this->db->prepare("SELECT * FROM contact");
        $query->execute();

        $contactsData = $query->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];

        foreach ($contactsData as $data) {
            $contact = new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
            $contacts[] = $contact;
        }
        return $contacts;
    }

    public function findOne($id) {
        $query = $this->db->prepare('SELECT * FROM contact WHERE id = ?');
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
        }

        return null;
    }

    public function createOne($contact) {
        $name = $contact->getName();
        $email = $contact->getEmail();
        $phone_number = $contact->getPhone();

        $query = $this->db->prepare('INSERT INTO contact (name, email, phone_number) VALUES (?,?,?)');
        $query->execute([$name, $email, $phone_number]);

        $id = $this->db->lastInsertId();
        $contact->setId($id);

        return $contact;
    }

}