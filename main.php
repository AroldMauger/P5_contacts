<?php
require_once 'DBConnect.php';
require_once 'ContactManager.php';

$dbconnect = new DBConnect();
$pdo = $dbconnect->getPDO();
$contactManager = new ContactManager($pdo);
while(true) {


    $line = readline("Entrez votre commande : ");


    if($line === "list") {
        $contacts = $contactManager->findAll();
        if(empty($contacts)) {
            echo "Aucun contact n'a été trouvé!";
        } else {
            echo str_pad("ID", 10) . str_pad("Name", 30) . str_pad("Email", 40) . str_pad("Phone number", 20) . "\n";
            echo str_repeat("-", 100) . "\n"; // Ligne de séparation

            foreach ($contacts as $contact) {
                echo str_pad($contact['id'], 10) . str_pad($contact['name'], 30) . str_pad($contact['email'], 40) . str_pad($contact['phone_number'], 20) . "\n";
            }
        }

    }
    else {
        echo "Vous avez saisi : $line\n";
    }
}