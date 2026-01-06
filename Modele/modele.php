<?php 
    function getBdd()
    {
        $bdd = new PDO(
            'mysql:host=localhost:3306;dbname=lbcjj;charset=utf8',
            'root', '',
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

    function getUserByName($name) 
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM compte_utilisateur WHERE nom_user = ?');
        $req->execute(array($name));
        $user = $req->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function createUser($nom_user, $prenom_user, $mdp_user, $mail_user)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO compte_utilisateur (nom_user, prenom_user, mdp_user, mail_user) VALUES (?, ?, ?, ?, ?)');
        $req->execute(array($id_user, $nom_user, $prenom_user, $mdp_user, $mail_user));
    }

    function deleteUser($id_user)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('DELETE FROM compte_utilisateur WHERE id_user = ?');
        $req->execute(array($id_user));
    }