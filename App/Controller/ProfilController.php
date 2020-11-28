<?php
namespace App\Controller;

use App\Model\recupModel;
use App\Model\ProfilModel;

class ProfilController{

    public function __construct()
    {
        $profil = $this->model = new ProfilModel();
        $this->model = new recupModel();
    }

    public function profil()
    {
        if($_SESSION['connect'] == true){
            $userinfos = $this->model->recup();
            $profil->profil();
            require ROOT."/App/View/profilView.php";
   
        }else{
         header('location:index.php?page=sign');
        }
       
    }
}