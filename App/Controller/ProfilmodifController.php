<?php
namespace App\Controller;

use App\Model\ProfilModifModel;

class ProfilmodifController{

    public function __construct()
    {
        $this->model = new ProfilModifModel();
    }

    public function modifier()
    {
        if($_SESSION['connect'] == true){
            require ROOT."/App/View/profilModifView.php";
            $this->model->modifier();
        }else{
         header('location:index.php?page=sign');
        }
    }
}