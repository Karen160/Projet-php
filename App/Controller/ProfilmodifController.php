<?php
namespace App\Controller;

use App\Model\ProfilmodifModel;

class ProfilmodifController{

    public function __construct()
    {
        $this->model = new Profilmodif();
    }

    public function modifier()
    {
        require ROOT."/App/View/profilModif.php";
        $this->model->modifier();
    }
}