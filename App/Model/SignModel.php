<?php
namespace APP\Model;

use Core\Database;

class SignModel extends Database{
    public function inscription(){
        $statement = $this->pdo->query("INSERT INTO user (')")
    }
}