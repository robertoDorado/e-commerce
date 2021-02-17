<?php
require_once "conection.class.php";

class dataCart {

    use Conection;

    public function getDataCart(){
        $sql = "SELECT * FROM purchase_cart";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}

$dataCart = new dataCart;
$arrayCart = $dataCart->getDataCart();
echo json_encode($arrayCart);