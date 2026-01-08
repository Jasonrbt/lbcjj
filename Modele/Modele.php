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

function getUsers()
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM compte_utilisateur ORDER BY id_user');
    $req->execute();
    $users = $req->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getUserByEmail($email)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM compte_utilisateur WHERE mail_user = ?');
    $req->execute([$email]);
    $user = $req->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getUserById($id_user)
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM compte_utilisateur WHERE id_user = ?');
    $req->execute([$id_user]);
    $user = $req->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function createUser($nom_user, $prenom_user, $mdp_user, $mail_user)
{
    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO compte_utilisateur (nom_user, prenom_user, mdp_user, mail_user) VALUES (?, ?, ?, ?)');
    $req->execute(array($nom_user, $prenom_user, password_hash($mdp_user, PASSWORD_DEFAULT), $mail_user));
}

function deleteUser($id_user)
{
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM compte_utilisateur WHERE id_user = ?');
    $req->execute(array($id_user));
}

function updateUser($id_user, $nom_user, $prenom_user, $mdp_user, $mail_user, $role_user = 'user')
{
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE compte_utilisateur SET nom_user = ?, prenom_user = ?, mdp_user = ?, mail_user = ?, role_user = ? WHERE id_user = ?');
    $req->execute(array($nom_user, $prenom_user, $mdp_user, $mail_user, $role_user, $id_user));
}

function updateUserRole($id_user, $role_user)
{
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE compte_utilisateur SET role_user = ? WHERE id_user = ?');
    $req->execute(array($role_user, $id_user));
}

// ===== Fonctions pour les annonces =====

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

function getAnnoncesByUser($id_user) 
{
    $bdd = getBdd();
    $req = $bdd->prepare('SELECT * FROM annonce WHERE id_user = ?');
    $req->execute([$id_user]);
    return $req->fetchAll(PDO::FETCH_ASSOC);
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

// ===== Fonctions pour les images =====

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
