<h1>Modifier l'annonce</h1>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_SESSION['error']) ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form action="index.php?action=updateAnnonce&id=<?= $annonce['ID_ANNONCE'] ?>" method="POST">
    <input type="text" name="titre" value="<?= htmlspecialchars($annonce['TITRE_ANNONCE'] ?? '') ?>" required> <br><br>
    <textarea name="description" required><?= htmlspecialchars($annonce['DESCRIPTION'] ?? '') ?></textarea> <br><br>
    <input type="number" name="prix" value="<?= $annonce['PRIX'] ?? 0 ?>" step="0.01" min="0" required> <br><br>
    <button type="submit">Mettre à jour</button>
</form>