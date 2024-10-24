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

    public function modify($id) {
        if (!$this->contactManager->findOne($id)) {
            echo "Le contact avec cet ID n'existe pas" . PHP_EOL;
            return;
        }

        echo "Veuillez renseigner les nouvelles informations du contact au format prénom NOM, email, téléphone" . PHP_EOL;
        $line = readline("Nouvelles informations : ");

        $contactData = explode(',', $line);

        if (count($contactData) === 3) {
            list($name, $email, $phoneNumber) = array_map('trim', $contactData);

            if ($this->contactManager->updateOne($id, $name, $email, $phoneNumber)) {
                echo "Contact modifié avec succès!" . PHP_EOL;
            } else {
                echo "Erreur lors de la modification du contact." . PHP_EOL;
            }
        } else {
            echo "Format incorrect. Utilisez : prénom NOM, email@example.com, 0600000000\n";
        }
    }
    public function help() {
        echo "Entrez votre commande (aide, lister, détailler, créer, supprimer, quitter) :\n";
        echo "help : affiche cette aide\n";
        echo "list : liste les contacts\n";
        echo "create [name], [email], [phone number] : crée un contact\n";
        echo "delete [id] : supprime un contact\n";
        echo "quit : quitte le programme\n";
        echo "\nAttention à la syntaxe des commandes, les espaces et virgules sont importants.\n";
    }
}
