<?php
    require_once __DIR__ . '/../Modele/modele.php';

    $action = $_GET['action'] ?? 'form';

    switch ($action) {
        case 'list':
            $users = getUsers();
            $content = __DIR__ . '/../Vue/listeUser.php';
            break;

        case 'form':
            $content = __DIR__ . '/../Vue/createUser.php';
            break;
            
            
        case 'create' :
            create();
            break;
            
        default: require __DIR__ .  'index.php';
        break;
    }

    function create() {
//echo "Controller appelé";
//die();
        if (empty($_POST['nom_user']) || empty($_POST['prenom_user']) || empty($_POST['mdp_user']) || empty($_POST['mail_user']) ) {
            $error = "Tous les champs sont obligatoires.";
            $content = __DIR__ . '/../Vue/createUser.php';
            require $content;
            return;
        }
        if (getUserByEmail($_POST['mail_user'])) {
            $error = "Un utilisateur avec cet email existe déjà.";
            $content = __DIR__ . '/../Vue/createUser.php';
            require 'index.php';
            exit;
        }
        createUser($_POST['nom_user'], $_POST['prenom_user'], $_POST['mdp_user'], $_POST['mail_user']);    
        header('Location: index.php?action=list');
        exit;              
    }