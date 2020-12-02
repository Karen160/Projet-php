<?php namespace App\Controller;

use App\Model\FriendModel;


class FriendController {
    public function __construct() {
        $this->model=new FriendModel();
    }

    public function render() {
        if($_SESSION['connect']) {
            $var=$this->model->friend();
            // $co = $this->model->statut();
            require ROOT."/App/View/friendView.php";
        }

        else {
            header('location:index.php?page=sign');
        }
    }

}