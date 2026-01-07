<?php 
    require_once 'Controller/controlUser.php';

    $action = $_GET['action'] ?? 'form';

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
            
        default: 
            $content = 'Vue/createUser.php';
            break;
    }
    
    require_once 'Vue/gabarit.php';
?> 
