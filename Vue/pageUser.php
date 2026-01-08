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

<a href="index.php?action=logout" class="btn btn-danger mb-3">Se déconnecter</a>

<?php if ($_SESSION['user']['role'] === 'admin') : ?>
    <div class="mb-3">
        <h3>Espace Admin</h3>
        <a href="index.php?action=list" class="btn btn-primary">Voir la liste des utilisateurs</a>
    </div>
<?php endif; ?>

<hr>

<h2>Mes annonces</h2>

<?php if (empty($annonces)) : ?>
    <p>Vous n'avez pas encore d'annonce.</p>
<?php else : ?>
    <div class="row g-4">
        <?php foreach ($annonces as $annonce) : 
            $images = getImagesByAnnonceId($annonce['ID_ANNONCE']);
            $firstImage = $images[0] ?? null;
        ?>
            <div class="col-md-6 col-lg-4">
                <a href="index.php?action=voirAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>" class="text-decoration-none">
                    <div class="card carte-produit h-100">
                        <div class="image-produit" style="height: 200px; overflow: hidden; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                            <?php if ($firstImage): ?>
                                <img src="ressources/imagesAnnonces/<?= htmlspecialchars($firstImage['chemin_image']) ?>"
                                    alt="<?= htmlspecialchars($annonce['TITRE_ANNONCE']) ?>"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <i class="fas fa-image fa-3x text-muted"></i>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= htmlspecialchars($annonce['TITRE_ANNONCE']) ?></h5>
                            <p class="card-text text-primary fw-bold"><?= number_format($annonce['PRIX'], 2, ',', ' ') ?> €</p>
                            <p class="card-text text-muted small">
                                <i class="far fa-clock"></i>
                                <?= date('d/m/Y', strtotime($annonce['DATE_'])) ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<a href="index.php?action=createAnnonce">Créer une annonce</a>