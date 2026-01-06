<?php 
    require_once 'Controller/controlUser.php'; 
?> 
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>LBCJJ</title>
</head>

    <body>
        <!-- Barre de navigation -->
        <nav class="barre-navigation">
            <div class="container adjust">
                <a href="#" class="logo-site">
                    <i class="fas fa-shopping-bag"></i> LBCJJ</a>
                <div class="icone-connexion">
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>
        </nav>

       <div class="container mt-4">
            <?php if (isset($content)) {
                require $content;
            } ?>
       </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/8da970bd7f.js" crossorigin="anonymous"></script>
    </body>

</html>
</body>

</html>