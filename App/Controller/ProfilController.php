<?php
namespace App\Controller;

use App\Model\ProfilModel;

class ProfilController{

    public function __construct()
    {
        $this->model = new ProfilModel();
    }

    public function profil()
    {
        if($_SESSION['connect'] == true){
            
          require ROOT."/App/View/profilView.php";
            $this->model->profil();
   
        }else{
        // header('location:index.php?page=sign');
        }
       
    }
}