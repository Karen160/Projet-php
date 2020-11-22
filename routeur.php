<?php

use App\Controller\SignController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'sign':
            $controller = new SignController();
            $controller->inscrire();
        break;
        
        default:
        # code...
    break;
    }
}else{
     $controller = new SignController();
     $controller->inscrire();
}
