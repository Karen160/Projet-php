<?php
namespace Model\SignController;
use APP\Model\SignModel;

class SignController{
    public function __construct()
    {
        $this->model = new SignModel();
    }

    public function render()
    {
        require ROOT."App/View/signView.php";
        $this->model->inscription();

    }
}
