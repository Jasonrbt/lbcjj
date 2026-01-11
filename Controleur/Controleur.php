<?php

require_once 'Modele/Modele.php';
//require_once __DIR__ . '/../Modele/modele.php';

function create()
{
    //echo "Controller appelé";
    //die();
    if (empty($_POST['nom_user']) || empty($_POST['prenom_user']) || empty($_POST['mdp_user']) || empty($_POST['mail_user'])) {
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
    header('Location: index.php');
    exit;
}

function createAnnonceController()
{
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?action=loginForm');
        exit();
    }

    $id_user = $_SESSION['user']['id'];

    // Vérifier que l'utilisateur existe dans la base
    // $user = getUserByEmail($_SESSION['user_email'] ?? '');
    // if (!$user) {
    //     $_SESSION['error'] = "Erreur : utilisateur non trouvé. Veuillez vous reconnecter.";
    //     session_destroy();
    //     header('Location: index.php?action=login');
    //     exit();
    // }

    // Vérifier que le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $content = 'Vue/annonce_form.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit();
    }

    // Données du formulaire 
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    // Validation du prix (doit être numérique)
    if (!is_numeric($prix) || $prix < 0) {
        $_SESSION['error'] = "Erreur : le prix doit être un nombre positif";
        header('Location: index.php?action=formAnnonce');
        exit();
    }

    // Création de l'annonce 
    $id_annonce = addAnnonce($titre, $description, $prix, $id_user);

    // Upload des images (seulement si des fichiers ont été uploadés)
    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $index => $filename) {
            // Vérifier que le fichier a bien été uploadé
            if ($_FILES['images']['error'][$index] === UPLOAD_ERR_OK) {
                $tmp = $_FILES['images']['tmp_name'][$index];
                $uniqueName = uniqid() . "_" . $filename;
                $destination = "ressources/imagesAnnonces/" . $uniqueName;
                move_uploaded_file($tmp, $destination);
                addImage($id_annonce, $uniqueName, $index + 1);
            }
        }
    }
    // Affichage de la vue 
    $content = 'Vue/annonce_succes.php';
    require __DIR__ . '/../Vue/gabarit.php';
}

function voirAnnonceController()
{
    $id = $_GET['id'] ?? null;

    if (!$id) {
        $content = 'Vue/annonce_not_found.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit();
    }

    $annonce = getAnnonceById($id);

    if (!$annonce) {
        $content = 'Vue/annonce_not_found.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit();
    }

    $images = getImagesByAnnonceId($id);
    $content = 'Vue/annonce_detail.php';
    require __DIR__ . '/../Vue/gabarit.php';
}

function editAnnonceController()
{
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?action=loginForm');
        exit();
    }

    $id = $_GET['id'];
    $annonce = getAnnonceById($id);

    // Vérifier que l'annonce existe
    if (!$annonce) {
        $content = 'Vue/annonce_not_found.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit();
    }

    // Vérifier que l'utilisateur est le propriétaire de l'annonce
    if ($annonce['ID_USER'] != $_SESSION['user']['id']) {
        $_SESSION['error'] = "Vous n'avez pas le droit de modifier cette annonce.";
        header("Location: index.php?action=voirAnnonce&id=$id");
        exit();
    }

    // Vérifier que le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $content = 'Vue/annonce_edit_form.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit();
    }

    // Traitement du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    // Validation du prix (doit être numérique)
    if (!is_numeric($prix) || $prix < 0) {
        $_SESSION['error'] = "Erreur : le prix doit être un nombre positif";
        header("Location: index.php?action=editAnnonce&id=$id");
        exit();
    }

    updateAnnonce($id, $titre, $description, $prix);

    header("Location: index.php?action=voirAnnonce&id=$id");
    exit;
}

function deleteAnnonceController()
{
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?action=loginForm');
        exit();
    }

    $id = $_GET['id'];
    $annonce = getAnnonceById($id);

    // Vérifier que l'annonce existe
    if (!$annonce) {
        $content = 'Vue/annonce_not_found.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit();
    }

    // Vérifier que l'utilisateur est le propriétaire de l'annonce
    if ($annonce['ID_USER'] != $_SESSION['user']['id']) {
        $_SESSION['error'] = "Vous n'avez pas le droit de supprimer cette annonce.";
        header("Location: index.php?action=voirAnnonce&id=$id");
        exit();
    }

    // Récupérer les images pour les supprimer du disque
    $images = getImagesByAnnonceId($id);

    foreach ($images as $img) {
        $file = "ressources/imagesAnnonces/" . $img['chemin_image'];
        if (file_exists($file)) {
            unlink($file);
        }
    }

    // Supprimer l’annonce
    deleteAnnonce($id);

    header("Location: index.php");
    exit;
}

function login()
{
    $stock = $_POST;

    if (empty($_POST['mail_user']) || empty($_POST['mdp_user'])) {
        $error = "Tous les champs sont obligatoires.";
        $content = 'Vue/loginUser.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit;
    }
    $user = getUserByEmail($_POST['mail_user']);

    if (!$user || !password_verify($_POST['mdp_user'], $user['MDP_USER'])) {
        $error = "Email ou mot de passe incorrect.";
        $content = 'Vue/loginUser.php';
        require __DIR__ . '/../Vue/gabarit.php';
        exit;
    }

    $_SESSION['user'] = [
        'id' => $user['ID_USER'],
        'nom' => $user['NOM_USER'],
        'prenom' => $user['PRENOM_USER'],
        'email' => $user['MAIL_USER'],
        'role' => $user['ROLE_USER']
    ];
    header('Location: index.php?action=user');
    exit;
}

function logout()
{
    session_destroy();
    header('Location: index.php');
    exit;
}

function updateUserRoleController()
{
    $id = $_POST['id'];
    $role = $_POST['role_user'];
    updateUserRole($id, $role);
    header('Location: index.php?action=list');
    exit;
}

function editUser()
{
    $id = $_GET['id'];
    $user = getUserById($id);
    $content = 'Vue/editUser.php';
    require __DIR__ . '/../Vue/gabarit.php';
}

function archiveUserController()
{
    $id = $_GET['id'];
    archiveUser($id);
    header('Location: index.php?action=list');
    exit;
}
