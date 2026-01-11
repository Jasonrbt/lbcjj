<div class="container mb-5">
    <h2 class="titre-section">Annonces récentes</h2>

    <div class="row g-4">
        <!-- Carte pour déposer une annonce -->
        <div class="col-md-6 col-lg-4">
            <a href="<?php echo isset($_SESSION['user']) ? 'index.php?action=formAnnonce' : 'index.php?action=loginForm'; ?>" class="text-decoration-none">
                <div class="card carte-deposer-annonce">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="icone-ajouter mb-3">
                            <i class="fas fa-plus-circle fa-4x text-white"></i>
                        </div>
                        <h3 class="card-title text-white mb-2">Déposer une annonce</h3>
                        <p class="text-white-50">C'est simple, rapide et gratuit !</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Affichage des annonces -->
        <?php foreach ($annonces as $annonce):
            $images = getImagesByAnnonceId($annonce['ID_ANNONCE']);
            $firstImage = $images[0] ?? null;
        ?>
            <div class="col-md-6 col-lg-4">
                <a href="index.php?action=voirAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>" class="text-decoration-none">
                    <div class="card carte-produit h-100">
                        <div class="image-produit">
                            <?php if ($firstImage): ?>
                                <img src="ressources/imagesAnnonces/<?= htmlspecialchars($firstImage['chemin_image']) ?>"
                                    alt="<?= htmlspecialchars($annonce['TITRE_ANNONCE']) ?>">
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
</div>