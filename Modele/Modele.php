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
    $req = $bdd->prepare('SELECT * FROM annonce ORDER BY date_ DESC');
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getAnnoncesByName($name)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM annonce WHERE nom LIKE ? ORDER BY date_ DESC');
    $req->execute(array('%' . $name . '%'));
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getAnnonceById($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM annonce WHERE id_annonce = ?');
    $req->execute(array($id_annonce));
    return $req->fetch(PDO::FETCH_ASSOC);
}

function addAnnonce($titre, $description, $prix, $id_user)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO annonce (titre_annonce, description, prix, date_,id_user) VALUES (?, ?, ?, NOW(), ?)');
    $req->execute(array($titre, $description, $prix, $id_user));
}

function deleteAnnonce($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM annonce WHERE id_annonce = ?');
    $req->execute(array($id_annonce));
}

function updateAnnonce($id_annonce, $titre, $description, $prix)
{
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE annonce SET titre_annonce = ?, description = ?, prix = ? WHERE id_annonce = ?');
    $req->execute(array($titre, $description, $prix, $id_annonce));
}

function getImagesByAnnonceId($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM image WHERE id_annonce = ?');
    $req->execute(array($id_annonce));
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function addImage($id_annonce, $chemin, $ordre)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO image (id_annonce, chemin, ordre) VALUES (?, ?, ?)');
    $req->execute(array($id_annonce, $chemin, $ordre));
}

function deleteImagesByAnnonceId($id_annonce)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM image WHERE id_annonce = ?');
    $req->execute(array($id_annonce));
}

function deleteImageById($id_image)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM image WHERE id_image = ?');
    $req->execute(array($id_image));
}
