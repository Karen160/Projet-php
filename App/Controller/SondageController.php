<?php namespace App\Controller;

use App\Model\SondageModel;

class SondageController {

    public function __construct() {
        $this->model=new SondageModel();
    }

    public function render() {
        if(($_SESSION['connect'])) {
            $sondage=$this->model->sondage();
            require ROOT."/App/View/sondageView.php";
        }

        else {
            header('location:index.php?page=home');

        }
    }
}