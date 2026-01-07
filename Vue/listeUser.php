<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>

<h1>Liste des utilisateurs</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= ($user['ID_USER']) ?></td>
            <td><?= ($user['NOM_USER']) ?></td>
            <td><?= ($user['PRENOM_USER']) ?></td>
            <td><?= ($user['MAIL_USER']) ?></td>
            <td><?= ($user['ROLE_USER']) ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
