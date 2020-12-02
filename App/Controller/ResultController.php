<?php
namespace App\Controller;

use App\Model\ResultModel;

class ResultController{

    public function __construct()
    {
        $this->model = new ResultModel();
    }

    public function render()
    {
        if($_SESSION['connect']){
            $requete =  $this->model->resultat();
            require ROOT."/App/View/resultView.php";
        }else{
            header('location:index.php?page=sign');
        } 
    }
}
