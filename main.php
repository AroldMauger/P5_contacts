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
            foreach ($contacts as $contact) {
                echo $contact->toString() . "\n";
            }
        }

    }
    else {
        echo "Vous avez saisi : $line\n";
    }
}