<?php

use App\Controller\SignController;
use App\Controller\ProfilController;
use App\Controller\ProfilmodifController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'home':
            $controller = new SignController();
            $controller->inscrire();
        case 'sign':
            $controller = new SignController();
            $controller->inscrire();
        break;
        case 'profil':
            $controller = new ProfilController();
            $controller->profil();
        case 'profilModif':
            $controller = new ProfilModifController();
            $controller->modifier();
    break;
    default:

    break;
    }
}else{
    $controller = new SignController();
    $controller->inscrire();
}
