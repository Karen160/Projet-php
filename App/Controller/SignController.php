<?php
namespace App\Controller;

use APP\Model\SignModel;

class SignController{
    public function __construct()
    {
        $this->model = new SignModel();
    }
    public function render()
    {
        $user = $this->model->query("SELECT * FROM user");
        require "../../App/View/signView.php";
    }
}