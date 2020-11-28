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
            $sond = $this->model->home();

            if($_SESSION['connect'] == true){
                $membre_id = $_SESSION['user']['id'];
                $sondPerso = $this->model->home();
            }
            
            require ROOT."/App/View/homeView.php";
    }

}