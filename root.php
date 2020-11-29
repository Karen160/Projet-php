<?php

use App\Controller\HomeController;
use App\Controller\SignController;
use App\Controller\ProfilController;
use App\Controller\newSondageController;
use App\Controller\SondageController;
use App\Controller\ProfilmodifController;
use App\Controller\FriendController;
use App\Controller\NewFriendController;

if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'home':
            $controller = new HomeController();
            $controller->render();
        break;
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
        case 'newSondage':
            $controller = new newSondageController();
            $controller->render();
        break;
        case 'sondage':
            $controller = new SondageController();
            $controller->render();
        break;
        case 'friend':
            $controller = new FriendController();
            $controller->render();
        break;
        case 'NewFriend':
            $controller = new NewFriendController();
            $controller->render();
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
