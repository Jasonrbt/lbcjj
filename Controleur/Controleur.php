<?php

require_once 'Modele/modele.php';

function createAnnonceController()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?action=login');
        exit();
    }

    $id_user = $_SESSION['user_id'];

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

    // Upload des images 
    foreach ($_FILES['images']['name'] as $index => $filename) {
        $tmp = $_FILES['images']['tmp_name'][$index];
        $uniqueName = uniqid() . "_" . $filename;
        $destination = "ressources/imagesAnnonces/" . $uniqueName;
        move_uploaded_file($tmp, $destination);
        // 3. Insertion dans la table image 
        addImage($id_annonce, $uniqueName, $index + 1);
    }
    // Affichage de la vue 
    require "Vue/annonce_succes.php";
}

function voirAnnonceController()
{
    $id = $_GET['id'];

    // Récupérer l'annonce
    $annonce = getAnnonceById($id);

    // Récupérer les images
    $images = getImagesByAnnonceId($id);

    require "Vue/annonce_detail.php";
}

function editAnnonceController()
{
    $id = $_GET['id'];

    $annonce = getAnnonceById($id);

    require "Vue/annonce_edit_form.php";
}

function updateAnnonceController()
{
    $id = $_GET['id'];
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
    $id = $_GET['id'];

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
