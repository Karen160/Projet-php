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
            
            $message =  $this->model->modifier();
            $user_infos = $this->model->recup();
            require ROOT."/App/View/profilModifView.php";
        }else{
         header('location:index.php?page=sign');
        }
    }
}