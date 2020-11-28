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
                $sondPerso = $this->model->home();
            }else{
               $this->model->home();
            }
            
            require ROOT."/App/View/homeView.php";
    }

}