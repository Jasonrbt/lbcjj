<h1>Créer un utilisateur</h1>

<?php if (!empty($error)) : ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if (!empty($success)) : ?>
    <p><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST" action="index.php?action=create">
    <label>Nom</label><br>
    <input type="text" name="nom_user" value="<?= htmlspecialchars($_POST['nom_user'] ?? '') ?>" required><br><br>

    <label>Prénom</label><br>
    <input type="text" name="prenom_user" value="<?= htmlspecialchars($_POST['prenom_user'] ?? '') ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="mail_user" value="<?= htmlspecialchars($_POST['mail_user'] ?? '') ?>" required><br><br>

    <label>Mot de passe</label><br>
    <input type="password" name="mdp_user" value="<?= htmlspecialchars($_POST['mdp_user'] ?? '') ?>" required><br><br>

    <button type="submit">Créer</button>
</form>
