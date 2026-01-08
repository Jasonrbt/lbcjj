<h1>Connexion</h1>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($error)) : ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if (!empty($success)) : ?>
    <p><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST" action="index.php?action=login">
    <label>Email</label><br>
    <input type="email" name="mail_user" value="<?= htmlspecialchars($_POST['mail_user'] ?? '') ?>" required><br><br>

    <label>Mot de passe</label><br>
    <input type="password" name="mdp_user" value="<?= htmlspecialchars($_POST['mdp_user'] ?? '') ?>" required><br><br>

    <a href="index.php?action=loginForm">
        <button type="submit">Se connecter</button>
    </a>
</form>

<p>Pas encore inscrit ? <a href="index.php?action=form">Créer un compte</a></p>
