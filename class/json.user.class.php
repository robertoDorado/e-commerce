<?php
require_once "conection.class.php";

class JsonUser {

    use Conection;

    public function readUsers() {
        $sql = "SELECT * FROM user_admin";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            $json = $sql->fetchAll();
            echo json_encode($json);
        }
    }
}

$user = new JsonUser;

$user->readUsers();

