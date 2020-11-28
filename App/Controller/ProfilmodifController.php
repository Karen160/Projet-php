<?php
namespace App\Controller;

use App\Model\recupModel;
use App\Model\ProfilModifModel;

class ProfilmodifController{

    public function __construct()
    {
        $this->model = new ProfilModifModel();
        $this->model = new recupModel();
    }

    public function modifier()
    {
        if($_SESSION['connect'] == true){
            $userinfos = $this->model->recup();
            $this->model->modifier();
            require ROOT."/App/View/profilModifView.php";
        }else{
         header('location:index.php?page=sign');
        }
    }
}