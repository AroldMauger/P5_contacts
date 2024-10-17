<?php
require_once 'Command.php';

while(true) {

    $line = readline("Entrez votre commande : ");


    if($line === "list") {
       $listCommand = new Command;
        $listCommand->list();
    }
    else {
        echo "Vous avez saisi : $line\n";
    }
}