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
<<<<<<< HEAD
        require "../../App/View/signView.php";
        $this->model->inscription();
       
    }
}
=======
        require ROOT."App/View/signView.php";
        $this->model->inscription();

    }
}
>>>>>>> ae398a31273e611b990c0b459512c2c4125fc319
