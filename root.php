<?php

use App\Controller\SignController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'sign':
            $controller = new SignController();
            $controller->inscrire();
        break;
        default:
            $controller = new SignController();
            $controller->inscrire();
    break;
    }
}else{
    $controller = new SignController();
    $controller->inscrire();
}
