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
        require ROOT."/App/View/signView.php";
        $this->model->inscription();
        

    }
}
