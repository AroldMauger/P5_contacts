<?php
require_once 'DBConnect.php';

while(true) {
    $line = readline("Entrez votre commande : ");

    if($line === "list") {
        echo "Affichage de la liste";
    }
    elseif($line === "dbtest") {
        try{
            $dbconnect = new DBConnect();
            $pdo = $dbconnect->getPDO();

            echo "Connexion réussie!";
        } catch (PDOException $e) {
            echo "La connexion a échoué" . $e->getMessage();
        }
    }
    else {
        echo "Vous avez saisi : $line\n";
    }
}