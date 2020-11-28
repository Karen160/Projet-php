<?php
namespace App\Controller;

use App\Model\ProfilModel;
use App\Model\ProfilModifModel;

class ProfilController{

    public function __construct()
    {
        $this->model = new ProfilModel();
        $this->model = new ProfilModifModel();
    }


    public function profil()
    {
        if($_SESSION['connect'] == true){
            
           $user_infos = $this->model->recup();
            $this->model->profil();
            require ROOT."/App/View/profilView.php";
   
        }else{
         header('location:index.php?page=sign');
        }
       
    }
}