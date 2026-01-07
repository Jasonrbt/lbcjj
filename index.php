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
    case 'loginForm':
        $content = 'Vue/loginUser.php';
        break;
    case 'login':
        login();
        break;
    case 'user':
        $annonces = getAnnoncesByUser($_SESSION['user']['id']);
        $content = 'Vue/pageUser.php';
        break;
    case 'createAnnonce':
        createAnnonceController();
        break;
    case 'formAnnonce':
        require "Vue/annonce_form.php";
        break;
    case 'voirAnnonce':
        voirAnnonceController();
        break;
    case 'editAnnonce':
        editAnnonceController();
        break;
    case 'updateAnnonce':
        updateAnnonceController();
        break;
    case 'deleteAnnonce':
        deleteAnnonceController();
        break;
    default:
        $content = null;
        break;
}

require_once 'Vue/gabarit.php';
