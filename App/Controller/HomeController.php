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
        require ROOT."/App/View/homeView.php";
        $this->model->Home();
    }

}