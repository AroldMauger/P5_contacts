<?php
require_once 'Command.php';

while(true) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, quit) ");

    if (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = $matches[1];
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
        echo "Commande non reconnue. Les commandes disponibles sont 'list', 'detail [id]', 'create' et 'delete [id]'.\n";
    }
}