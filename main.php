<?php
require_once 'Command.php';
// Détail de l'expression régulière dans preg_match
//^delete : Indique que la ligne doit commencer par le mot "delete".
//\s+ : Représente un ou plusieurs espaces blancs après "delete".
//(\d+) : Représente un ou plusieurs chiffres.
//$ : Indique que la ligne doit se terminer après les chiffres.

while(true) {
    $line = readline("Entrez votre commande (help, list, detail, create, modify, delete, quit) ");

    if (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = $matches[1];  // on fait [1] pour récupérer l'ID  :  $matches => "detail ID", $matches[0] => "detail", $matches[1] => ID capturé ici (\d+)
        $detailCommand = new Command();
        $detailCommand->detail($id);

    } elseif (preg_match('/^delete\s+(\d+)$/', $line, $matches)) {
        $id = $matches[1];
        $deleteCommand = new Command();
        $deleteCommand->delete($id);
    }

    elseif ($line === "list") {
        $listCommand = new Command();
        $listCommand->list();

    } elseif (preg_match('/^create\s+(.+)$/', $line, $matches)) {
        $contactData = explode(',', $matches[1]); // $matches[1] ici contient prénom, email, téléphone

        if (count($contactData) === 3) {
            //array_map permet d'itérer sur chaque valeur de mon tableau
            [$name, $email, $phoneNumber] = array_map('trim', $contactData); // on assigne 3 variables à mon array et on fait un trim pour supprimer les espaces

            $createCommand = new Command();
            $createCommand->create([
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber
            ]);
        } else {
            echo "Format incorrect. Utilisez : create Nom Prénom, email@example.com, 0600000000\n";
        }
    }  elseif (preg_match('/^modify\s+(\d+)$/', $line, $matches)) {
        $id = $matches[1];
        $modifyCommand = new Command();
        $modifyCommand->modify($id);
    }

    elseif ($line === 'quit') {
        exit;
    }
    elseif ($line === 'help') {
        $command = new Command();
        $command->help();
    }
    else {
        echo "Commande non reconnue. Les commandes disponibles sont 'list', 'detail [id]', 'create', 'modify' et 'delete [id]'.\n";
    }
}