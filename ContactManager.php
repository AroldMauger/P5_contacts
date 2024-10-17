<?php
require_once 'DBConnect.php';
class ContactManager
{

    private $db;
    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function findAll() {
        $query = $this->db->prepare("SELECT * FROM contact");
        $query->execute();

        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);

        return $contacts;
    }
}