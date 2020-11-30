<?php
namespace App\Controller;

use App\Model\FriendModel;


class FriendController{
    public function __construct()
    {
        $this->model = new FriendModel();
    }
    public function render()
    {             
            $var = $this->model->friend();
            require ROOT."/App/View/friendView.php";
    }

}