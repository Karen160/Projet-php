<?php
namespace App\Controller;

use App\Model\NewFriendModel;


class NewFriendController{
    public function __construct()
    {
        $this->model = new NewFriendModel();
    }
    public function render()
    {            
            $Result= $this->model->friend();
            require ROOT."/App/View/newFriendView.php";
    }

}