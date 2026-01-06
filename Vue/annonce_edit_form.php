<form action="index.php?action=updateAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>" method="POST">
    <input type="text" name="titre" value="<?= htmlspecialchars($annonce['TITRE_ANNONCE'] ?? '') ?>" required>
    <textarea name="description" required><?= htmlspecialchars($annonce['DESCRIPTION'] ?? '') ?></textarea>
    <input type="number" name="prix" value="<?= $annonce['PRIX'] ?? 0 ?>" required>

    <button type="submit">Mettre à jour</button>
</form>