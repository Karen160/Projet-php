<?php
namespace App\Controller;

use App\Model\newSondageModel;

class newSondageController{

    public function __construct()
    {
        $this->model = new newSondageModel();
    }

    public function render()
    {
        if(($_SESSION['connect'] == false )){
            header('location:index.php?page=sign');
        }else{
            $msg = $this->model->newsondage();
            require ROOT."/App/View/newSondageView.php";
        }
    }
}
