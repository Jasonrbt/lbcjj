<h1>Créer une annonce</h1>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_SESSION['error']) ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form action="index.php?action=createAnnonce" method="POST" enctype="multipart/form-data">
    <input type="text" name="titre" placeholder="Titre" required> <br><br>
    <textarea name="description" placeholder="Description" required></textarea> <br><br>
    <input type="number" name="prix" placeholder="Prix" required> <br><br>
    <input type="file" name="images[]" multiple required> <br><br>
    <button type="submit">Créer l'annonce</button>
</form>