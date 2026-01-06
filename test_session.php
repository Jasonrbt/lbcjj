<?php

/**
 * Fichier de test - Simule une session utilisateur connecté
 * À supprimer ou sécuriser en production !
 */

session_start();

// Simuler un utilisateur connecté avec l'ID 1
$_SESSION['user_id'] = 1;

echo "✓ Session de test créée avec user_id = 1<br>";
echo "<a href='index.php?action=formAnnonce'>Créer une annonce</a><br>";
echo "<a href='index.php'>Retour à l'accueil</a>";
