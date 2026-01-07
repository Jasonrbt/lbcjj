<?php 
    require_once 'Controller/controlUser.php';

    $action = $_GET['action'] ?? 'home';

    switch ($action) {
        case 'list':
            $users = getUsers();
            $content = 'Vue/listeUser.php';
            break;

        case 'form':
            $content = 'Vue/createUser.php';
            break;
            
            
        case 'create' :
            create();
            break;

        case 'login' :
            $content = 'Vue/loginUser.php';
            break;
            
        default: 
            $content = null;
            break;
    }
    
    require_once 'Vue/gabarit.php';
?> 
