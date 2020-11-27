<?php

use App\Controller\HomeController;
use App\Controller\SignController;
use App\Controller\ProfilController;
use App\Controller\ProfilmodifController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'home':
            $controller = new HomeController();
            $controller->render();
        case 'sign':
            $controller = new SignController();
            $controller->render();
        break;
        case 'profil':
            $controller = new ProfilController();
            $controller->profil();
        break; 
        case 'profilModif':
            $controller = new ProfilModifController();
            $controller->modifier();
        break;
        default:
            $controller = new HomeController();
            $controller->render();
        break;
    }
}else{
    $controller = new HomeController();
    $controller->render();
}
