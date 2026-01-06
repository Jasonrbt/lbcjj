<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Créer un utilisateur</title>
    </head>
    <body>

        <h1>Créer un utilisateur</h1>

        <?php if (!empty($error)) : ?>
            <p style="color:red"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <p style="color:green"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="POST" action="index.php?action=create">
            <label>Nom</label><br>
            <input type="text" name="nom_user" required><br><br>

            <label>Prénom</label><br>
            <input type="text" name="prenom_user" required><br><br>

            <label>Email</label><br>
            <input type="email" name="mail_user" required><br><br>

            <label>Mot de passe</label><br>
            <input type="password" name="mdp_user" required><br><br>

            <button type="submit">Créer</button>
        </form>

    </body>
</html>
