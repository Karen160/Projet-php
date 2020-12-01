<?php namespace App\Controller;

use App\Model\SondageModel;

class SondageController {

    public function __construct() {
        $this->model=new SondageModel();

    }

    public function render() {
        if(($_SESSION['connect'])) {
            $id=$this->model->verif();
            $msg =$this->model->share();
            if( !empty($id) &&  !empty($_GET['sondage'])) {
                $sondage=$this->model->sondage();
                $commentaire = $this->model->comment();
                $this->model->addAnswer();
                require ROOT."/App/View/sondageView.php";
            }else {
                header('location:index.php?page=home');
            }
        }else{
            header('location:index.php?page=home');
        }
    }
}