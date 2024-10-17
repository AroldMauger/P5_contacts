<?php
require_once 'DBConnect.php';
require_once 'ContactManager.php';

class Command
{
    private $pdo;
    private $contactManager;

    public function __construct() {

        $this->contactManager = new ContactManager($this->pdo);
    }

    public function list() {
        $contacts = $this->contactManager->findAll();

        if (empty($contacts)) {
            echo "Aucun contact n'a été trouvé!";
        } else {
            foreach ($contacts as $contact) {
                echo $contact->toString() . "\n"; // Utilise la méthode toString() de la classe Contact
            }
        }
    }

}
