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
        return;
    case 'formAnnonce':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        $content = 'Vue/annonce_form.php';
        break;
    case 'voirAnnonce':
        voirAnnonceController();
        return;
    case 'editAnnonce':
        editAnnonceController();
        return;
    case 'updateAnnonce':
        updateAnnonceController();
        break;
    case 'deleteAnnonce':
        deleteAnnonceController();
        break;
    default:
        $annonces = getAllAnnonces();
        $content = 'Vue/home.php';
        break;
}

require_once 'Vue/gabarit.php';
