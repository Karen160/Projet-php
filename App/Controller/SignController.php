<?php
namespace App\Controller;

use App\Model\SignModel;

class SignController{

    public function __construct()
    {
        $this->model = new SignModel();
    }

    public function inscrire()
    {
        if(($_SESSION['connect'] == false )){
            $this->model->inscription();
            require ROOT."/App/View/signView.php";
        }else{
         header('location:index.php?page=profil');
        }
    }
}
