<?php
require_once 'Command.php';

while(true) {
    $line = readline("Entrez votre commande : ");

    if (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = $matches[1];
        $detailCommand = new Command();
        $detailCommand->detail($id);

    } elseif ($line === "list") {
        $listCommand = new Command();
        $listCommand->list();

    } elseif (preg_match('/^create\s+(.+)$/', $line, $matches)) {
        $contactData = explode(',', $matches[1]);

        if (count($contactData) === 3) {
            list($name, $email, $phoneNumber) = array_map('trim', $contactData);

            $createCommand = new Command();
            $createCommand->create([
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber
            ]);
        } else {
            echo "Format incorrect. Utilisez : create Nom Prénom, email@example.com, 0600000000\n";
        }
    }
    else {
        echo "Commande non reconnue. Les commandes disponibles sont 'list' et 'detail [id]'.\n";
    }
}