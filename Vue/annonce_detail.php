<div class="container mt-4 mb-5">
    <div class="row">
        <!-- Section Images -->
        <div class="col-lg-7 mb-4">
            <div class="card detail-annonce-images">
                <?php if (empty($images)): ?>
                    <!-- Aucune image -->
                    <div class="placeholder-image">
                        <i class="fas fa-image fa-5x text-muted"></i>
                        <p class="mt-3 text-muted">Aucune image disponible</p>
                    </div>
                <?php elseif (count($images) === 1): ?>
                    <!-- Une seule image : affichage simple -->
                    <img src="ressources/imagesAnnonces/<?= htmlspecialchars($images[0]['chemin_image']) ?>"
                        class="d-block w-100"
                        alt="<?= htmlspecialchars($annonce['TITRE_ANNONCE']) ?>">
                <?php else: ?>
                    <!-- Plusieurs images : carousel avec navigation -->
                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php foreach ($images as $index => $img): ?>
                                <button type="button" data-bs-target="#carouselImages"
                                    data-bs-slide-to="<?= $index ?>"
                                    class="<?= $index === 0 ? 'active' : '' ?>">
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <div class="carousel-inner">
                            <?php foreach ($images as $index => $img): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                    <img src="ressources/imagesAnnonces/<?= htmlspecialchars($img['chemin_image']) ?>"
                                        class="d-block w-100"
                                        alt="<?= htmlspecialchars($annonce['TITRE_ANNONCE']) ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Section Détails -->
        <div class="col-lg-5">
            <div class="card detail-annonce-info">
                <div class="card-body">
                    <h1 class="detail-titre"><?= htmlspecialchars($annonce['TITRE_ANNONCE'] ?? '') ?></h1>

                    <div class="detail-prix-container">
                        <span class="detail-prix"><?= number_format($annonce['PRIX'] ?? 0, 2, ',', ' ') ?> €</span>
                    </div>

                    <div class="detail-date mb-4">
                        <i class="far fa-clock"></i>
                        Publié le <?= date('d/m/Y', strtotime($annonce['DATE_'])) ?>
                    </div>

                    <hr>

                    <h5 class="detail-section-titre">Description</h5>
                    <p class="detail-description"><?= nl2br(htmlspecialchars($annonce['DESCRIPTION'] ?? 'Aucune description')) ?></p>

                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $annonce['ID_USER']): ?>
                        <hr>
                        <div class="detail-actions">
                            <a href="index.php?action=editAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>"
                                class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-edit"></i> Modifier l'annonce
                            </a>
                            <a href="index.php?action=deleteAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>"
                                class="btn btn-danger w-100"
                                onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?');">
                                <i class="fas fa-trash"></i> Supprimer l'annonce
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="index.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Retour aux annonces
        </a>
    </div>
</div>