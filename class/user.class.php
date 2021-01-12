<?php
session_start();
require_once "conection.class.php";

class User{

    use Conection;

    public function cadastrar($nome, $email, $senha){
        if($this->verificarEmail($email) == false){
            $sql = "INSERT INTO user_admin SET nome = :nome, email = :email, senha = :senha";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            echo '
            <script>
                alert("Conta cadastrada com sucesso!")
                window.location.href = "http://localhost/projetos/e-commerce/login.php"
            </script>';
    
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
            return $_SESSION["user"] = $sql->fetch();
        }
    }
}
