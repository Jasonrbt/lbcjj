<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card form-annonce-card">
                <div class="card-body p-4">
                    <h1 class="form-annonce-titre mb-4">
                        <i class="fas fa-sign-in-alt text-primary"></i> Connexion
                    </h1>

                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($error)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <?= htmlspecialchars($error) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i>
                            <?= htmlspecialchars($success) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php?action=login">
                        <div class="mb-4">
                            <label for="mail_user" class="form-label">
                                <i class="fas fa-envelope"></i> Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email"
                                class="form-control form-control-lg"
                                id="mail_user"
                                name="mail_user"
                                placeholder="votre@email.com"
                                value="<?= htmlspecialchars($_POST['mail_user'] ?? '') ?>"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="mdp_user" class="form-label">
                                <i class="fas fa-lock"></i> Mot de passe
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password"
                                class="form-control form-control-lg"
                                id="mdp_user"
                                name="mdp_user"
                                placeholder="••••••••"
                                value="<?= htmlspecialchars($_POST['mdp_user'] ?? '') ?>"
                                required>
                        </div>

                        <hr class="my-4">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-submit-annonce">
                                <i class="fas fa-sign-in-alt"></i> Se connecter
                            </button>
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Annuler
                            </a>
                        </div>

                        <p class="text-center mt-4 mb-0">
                            <small class="text-muted">
                                Pas encore inscrit ?
                                <a href="index.php?action=form" class="text-decoration-none fw-bold" style="color: var(--couleur-orange-principale);">
                                    Créer un compte
                                </a>
                            </small>
                        </p>

                        <p class="text-muted text-center mt-3 mb-0">
                            <small><span class="text-danger">*</span> Champs obligatoires</small>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>