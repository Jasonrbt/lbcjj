<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>

<h1>Liste des utilisateurs</h1>

<div class="mb-4">
    <h3>Modifier le rôle d'un utilisateur</h3>
    <form method="POST" action="index.php?action=updateUserRole" class="d-flex gap-2">
        <select name="id" class="form-control" style="max-width: 300px;" required>
            <option value="">-- Sélectionner un utilisateur --</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['ID_USER'] ?>"><?= htmlspecialchars($user['ID_USER'] . ' - ' . $user['NOM_USER'] . ' ' . $user['PRENOM_USER']) ?></option>
            <?php endforeach; ?>
        </select>
        <select name="role_user" class="form-control" style="max-width: 150px;" required>
            <option value="">-- Rôle --</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= ($user['ID_USER']) ?></td>
            <td><?= ($user['NOM_USER']) ?></td>
            <td><?= ($user['PRENOM_USER']) ?></td>
            <td><?= ($user['MAIL_USER']) ?></td>
            <td><?= ($user['ROLE_USER']) ?></td>
            <td>
                <a href="index.php?action=deleteUser&id=<?= $user['ID_USER'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir archiver cet utilisateur ?');">Archiver</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
