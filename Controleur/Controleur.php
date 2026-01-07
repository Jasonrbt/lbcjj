<?php
    require_once __DIR__ . '/../Modele/Modele.php';

    function create() {
//echo "Controller appelé";
//die();
        if (empty($_POST['nom_user']) || empty($_POST['prenom_user']) || empty($_POST['mdp_user']) || empty($_POST['mail_user']) ) {   
            $error = "Tous les champs sont obligatoires.";
            $content = 'Vue/createUser.php';
            require __DIR__ . '/../Vue/gabarit.php';
            return;
        }
        if (strlen($_POST['mdp_user']) < 5) {
            $error = "Le mot de passe doit contenir au moins 5 caractères.";
            $content = 'Vue/createUser.php';
            require __DIR__ . '/../Vue/gabarit.php';
            exit;
        }
        if (getUserByEmail($_POST['mail_user'])) {
            $error = "Un utilisateur avec cet email existe déjà.";
            $content = 'Vue/createUser.php';
            require __DIR__ . '/../Vue/gabarit.php';
            exit;
        }
        createUser($_POST['nom_user'], $_POST['prenom_user'], $_POST['mdp_user'], $_POST['mail_user']);    
        header('Location: index.php?action=list');
        exit;              
    }