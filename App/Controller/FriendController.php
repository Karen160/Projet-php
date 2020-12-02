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
            if($_SESSION['connect']){
                $this->model->resultat();
                // $co = $this->model->statut();
                require ROOT."/App/View/resultView.php";
            }else{
                header('location:index.php?page=sign');
            } 
    }

}