<?php
require_once 'Controleur/Controleur.php';

session_start();

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'list':
        $users = getUsers();
        $content = 'Vue/listeUser.php';
        break;
    case 'form':
        $content = 'Vue/createUser.php';
        break;
    case 'create':
        create();
        break;
    case 'login':
        $content = 'Vue/loginUser.php';
        break;
    case 'createAnnonce':
        require "Controleur/Controleur.php";
        createAnnonceController();
        break;
    case 'formAnnonce':
        require "Vue/annonce_form.php";
        break;
    case 'voirAnnonce':
        require "Controleur/Controleur.php";
        voirAnnonceController();
        break;
    case 'editAnnonce':
        require "Controleur/Controleur.php";
        editAnnonceController();
        break;
    case 'updateAnnonce':
        require "Controleur/Controleur.php";
        updateAnnonceController();
        break;
    case 'deleteAnnonce':
        require "Controleur/Controleur.php";
        deleteAnnonceController();
        break;
    default:
        $content = null;
        break;
}

require_once 'Vue/gabarit.php';
