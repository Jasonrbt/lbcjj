<?php

function getBdd()
{
    $bdd = new PDO(
        'mysql:host=localhost:3306;dbname=lbcjj;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    return $bdd;
}

function getAllAnnonces()
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM annonce ORDER BY DATE_ DESC');
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getAnnoncesByName($name)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM annonce WHERE TITRE_ANNONCE LIKE ? ORDER BY DATE_ DESC');
    $req->execute(array('%' . $name . '%'));
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getAnnonceById($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM annonce WHERE ID_ANNONCE = ?');
    $req->execute(array($id_annonce));
    return $req->fetch(PDO::FETCH_ASSOC);
}

function addAnnonce($titre, $description, $prix, $id_user)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO annonce (TITRE_ANNONCE, DESCRIPTION, PRIX, DATE_, ID_USER) VALUES (?, ?, ?, NOW(), ?)');
    $req->execute(array($titre, $description, $prix, $id_user));
    return $bdd->lastInsertId();
}

function deleteAnnonce($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM annonce WHERE ID_ANNONCE = ?');
    $req->execute(array($id_annonce));
}

function updateAnnonce($id_annonce, $titre, $description, $prix)
{
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE annonce SET TITRE_ANNONCE = ?, DESCRIPTION = ?, PRIX = ? WHERE ID_ANNONCE = ?');
    $req->execute(array($titre, $description, $prix, $id_annonce));
}

function getImagesByAnnonceId($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM image WHERE ID_ANNONCE = ?');
    $req->execute(array($id_annonce));
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function addImage($id_annonce, $nomFichier, $ordre)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO image (ID_ANNONCE, chemin_image, ordre) VALUES (?, ?, ?)');
    $req->execute(array($id_annonce, $nomFichier, $ordre));
}

function deleteImagesByAnnonceId($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM image WHERE ID_ANNONCE = ?');
    $req->execute(array($id_annonce));
}

function deleteImageById($id_image)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM image WHERE ID_IMAGE = ?');
    $req->execute(array($id_image));
}
