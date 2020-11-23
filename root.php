<?php

use App\Controller\SignController;
use App\Controller\ProfilController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'sign':
            $controller = new SignController();
            $controller->inscrire();
        break;
        case 'profil':
            $controller = new ProfilController();
            $controller->profil();
        default:
            $controller = new SignController();
            $controller->inscrire();
    break;
    }
}else{
    $controller = new SignController();
    $controller->inscrire();
}
