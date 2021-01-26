<?php
require_once "conection.class.php";
class Cart{

    use Conection;

    private function getProductInfo($id){
        $array = array();

        $sql = "SELECT titulo_produto, preco_produto, img_produto, descricao_produto FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getList(){
        $array = array();
        $cart = $_SESSION['cart'];

        foreach($cart as $id => $qtd){

        if($this->getProductInfo($id) != null){

            $info = $this->getProductInfo($id);

            $array[] = array(
                'id' => $id,
                'qtd' => $qtd,
                'title' => utf8_encode($info['titulo_produto']),
                'price' => $info['preco_produto'],
                'img' => $info['img_produto'],
                'description' => utf8_encode($info['descricao_produto'])
            );
        }
        
    }
        return $array;
    }

    public function delCartItem($id){
        if(isset($id)){
            unset($_SESSION['cart'][$id]);
        }
    }
}