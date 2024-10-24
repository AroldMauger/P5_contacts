<?php
require_once 'DBConnect.php';
require_once 'ContactManager.php';

class Command
{
    private $contactManager;

    public function __construct() {

        $this->contactManager = new ContactManager();
    }

    public function list() {
        $contacts = $this->contactManager->findAll();

        if (empty($contacts)) {
            echo "Aucun contact n'a été trouvé!". PHP_EOL;
        } else {
            foreach ($contacts as $contact) {
                echo $contact->toString() . "\n";
            }
        }
    }

    public function detail($id) {
        $contact = $this->contactManager->findOne($id);

        if (empty($contact)) {
            echo "Aucun contact ne correspond à votre recherche.". PHP_EOL;
        } else {
            echo $contact->toString() . "\n";
        }
    }

    public function create($contactData) {
        $contact = new Contact(null, $contactData['name'], $contactData['email'], $contactData['phone_number']);
        $this->contactManager->createOne($contact);
        echo "Contact créé avec succès!" . PHP_EOL;
    }

    public function delete($id) {
        $result = $this->contactManager->deleteOne($id);
        if ($result) {
            echo "Contact supprimé avec succès!" . PHP_EOL;
        } else {
            echo "Le contact avec cet ID n'existe pas. Veuillez entrer un ID existant." . PHP_EOL;
        }
    }
}
