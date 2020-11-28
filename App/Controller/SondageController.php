<?php
namespace App\Controller;

use App\Model\SondageModel;

class SondageController{

    public function __construct()
    {
        $this->model = new SondageModel();
    }
}
