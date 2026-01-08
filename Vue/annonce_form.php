<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card form-annonce-card">
                <div class="card-body p-4">
                    <h1 class="form-annonce-titre mb-4">
                        <i class="fas fa-plus-circle text-primary"></i> Créer une annonce
                    </h1>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <?= htmlspecialchars($_SESSION['error']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <form action="index.php?action=createAnnonce" method="POST" enctype="multipart/form-data">

                        <div class="mb-4">
                            <label for="titre" class="form-label">
                                <i class="fas fa-heading"></i> Titre de l'annonce
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                class="form-control form-control-lg"
                                id="titre"
                                name="titre"
                                placeholder="Ex: Vélo de course comme neuf"
                                value="<?= htmlspecialchars($_POST['titre'] ?? '') ?>"
                                required>
                            <div class="form-text">Soyez clair et précis pour attirer l'attention</div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left"></i> Description
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control"
                                id="description"
                                name="description"
                                rows="6"
                                placeholder="Décrivez votre article en détail : état, caractéristiques, raison de la vente..."
                                required><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                            <div class="form-text">Plus votre description est complète, plus vous aurez de chances de vendre</div>
                        </div>

                        <div class="mb-4">
                            <label for="prix" class="form-label">
                                <i class="fas fa-euro-sign"></i> Prix
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-lg">
                                <input type="number"
                                    class="form-control"
                                    id="prix"
                                    name="prix"
                                    placeholder="0.00"
                                    value="<?= htmlspecialchars($_POST['prix'] ?? '') ?>"
                                    step="0.01"
                                    required>
                                <span class="input-group-text">€</span>
                            </div>
                            <div class="form-text">Indiquez un prix attractif et réaliste</div>
                        </div>

                        <div class="mb-4">
                            <label for="images" class="form-label">
                                <i class="fas fa-images"></i> Photos
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file"
                                class="form-control form-control-lg"
                                id="images"
                                name="images[]"
                                multiple
                                accept="image/*"
                                required>
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i>
                                Vous pouvez sélectionner plusieurs images. Les annonces avec photos sont 7 fois plus consultées !
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-submit-annonce">
                                <i class="fas fa-check-circle"></i> Publier mon annonce
                            </button>
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Annuler
                            </a>
                        </div>

                        <p class="text-muted text-center mt-3 mb-0">
                            <small><span class="text-danger">*</span> Champs obligatoires</small>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>