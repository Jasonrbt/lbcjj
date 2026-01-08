<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php?action=loginForm');
    exit;
}
?>

<h1>Mon compte</h1>

<p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
<p><strong>Prénom :</strong> <?= htmlspecialchars($_SESSION['user']['prenom']) ?></p>
<p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['user']['email']) ?></p>

<hr>

<h2>Mes annonces</h2>

<?php if (empty($annonces)) : ?>
    <p>Vous n'avez pas encore d'annonce.</p>
<?php else : ?>
    <ul>
        <?php foreach ($annonces as $annonce) : ?>
            <li>
                <strong><?= htmlspecialchars($annonce['TITRE_ANNONCE']) ?></strong><br>
                <?= htmlspecialchars($annonce['DESCRIPTION']) ?><br>
                <?= htmlspecialchars($annonce['PRIX']) ?> €
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<a href="index.php?action=createAnnonce">Créer une annonce</a>