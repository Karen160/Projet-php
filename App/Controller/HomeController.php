<?php
namespace App\Controller;

use App\Model\HomeModel;


class HomeController{
    public function __construct()
    {
        $this->model = new HomeModel();
    }
    public function render()
    {               
        if(!isset($_SESSION['connect'])){
            $_SESSION['connect'] = false;
        }
        if($_SESSION['connect'] == true){
            $requete = $this->model->homeConnect();
            $nombre =  $this->model->sondageAnswer();

        }else{
            $allSondage = $this->model->home();
        }
        require ROOT."/App/View/homeView.php";
    }
}