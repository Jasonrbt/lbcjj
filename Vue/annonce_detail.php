<h1><?= htmlspecialchars($annonce['TITRE_ANNONCE'] ?? '') ?></h1>

<p><?= nl2br(htmlspecialchars($annonce['DESCRIPTION'] ?? '')) ?></p>

<p>Prix : <?= $annonce['PRIX'] ?? 0 ?> €</p>

<h3>Images :</h3>

<?php foreach ($images as $img): ?>
    <img src="ressources/imagesAnnonces/<?= $img['chemin_image'] ?>"
        style="max-width:200px; margin:10px;">
<?php endforeach; ?>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $annonce['ID_USER']): ?>
    <br>
    <a href="index.php?action=editAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>">Modifier l'annonce</a>
    <br>
    <a href="index.php?action=deleteAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>"
        onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?');">
        Supprimer l'annonce
    </a>
<?php endif; ?>