<?php
namespace App\Controller;

use App\Model\SignModel;

class SignController{

    public function __construct()
    {
        $this->model = new SignModel();
    }

    public function render()
    {
        if(($_SESSION['connect'] == false )){
            $msg = $this->model->inscription();
            $this->model->connexion();
            require ROOT."/App/View/signView.php";
        }else{
         header('location:index.php?page=profil');
        }
    }
}
