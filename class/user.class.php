<?php
session_start();
require_once "conection.class.php";

class User{

    use Conection;

    public function cadastrar($nome, $email, $senha, $img){
        if($this->verificarEmail($email) == false){
            $sql = "INSERT INTO user_admin SET nome = :nome, email = :email, senha = :senha, img_user = :img_user";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":img_user", $img);
            $sql->execute();
    
            return true;
        }
    }

    public function loginUser($email, $password){
        $sql = "SELECT * FROM user_admin WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $password);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $id = $sql['id'];
            $ip = $_SERVER["REMOTE_ADDR"];

            
            $sql = "UPDATE user_admin SET ip = :ip WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":ip", $ip);
            $sql->bindValue(":id", $id);
            $sql->execute();

            return $_SESSION["user"] = $id;
        }else{
            return false;
        }
    }

    private function verificarEmail($email){
        $sql = "SELECT * FROM user_admin WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }

    }

    public function getUsers($id) {
        $sql = "SELECT * FROM user_admin WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getIdIp($id, $ip){
        $sql = "SELECT * FROM user_admin WHERE id = :id AND ip = :ip";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->bindValue("ip", $ip);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }
}


