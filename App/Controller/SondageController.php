<?php
namespace App\Controller;

use App\Model\SondageModel;

class SondageController{

    public function __construct()
    {
        $this->model = new SondageModel();
    }

    public function render()
    {
        if(($_SESSION['connect'] == false )){
            header('location:index.php');
        }else{
            require ROOT."/App/View/sondageView.php";
        }
    }
}
