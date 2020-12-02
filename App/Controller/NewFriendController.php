<?php namespace App\Controller;

use App\Model\NewFriendModel;


class NewFriendController {
    public function __construct() {
        $this->model=new NewFriendModel();
    }

    public function render() {
        if($_SESSION['connect']) {
            $var=$this->model->NewFriend();
            $co=$this->model->statut();
            require ROOT."/App/View/newFriendView.php";
        }

        else {
            header('location:index.php?page=sign');
        }
    }
}