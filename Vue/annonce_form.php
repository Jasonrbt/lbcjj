<form action="index.php?action=createAnnonce" method="POST" enctype="multipart/form-data">
    <input type="text" name="titre" placeholder="Titre" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="number" name="prix" placeholder="Prix" required>
    <input type="file" name="images[]" multiple required>
    <button type="submit">Créer l'annonce</button>
</form>