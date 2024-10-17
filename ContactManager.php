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


}