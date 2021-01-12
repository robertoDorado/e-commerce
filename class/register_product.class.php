<?php
require_once "conection.class.php";

class Product {

    use Conection;

    public function cadastrarProduto($titulo, $descricao, $preco, $img, $novoProduto){
        $sql = 'INSERT INTO register_product SET titulo_produto = :titulo_produto,
        descricao_produto = :descricao_produto, preco_produto = :preco_produto,
        img_produto = :img_produto, novo_produto = :novo_produto';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":titulo_produto", $titulo);
        $sql->bindValue(":descricao_produto", $descricao);
        $sql->bindValue(":preco_produto", $preco);
        $sql->bindValue(":img_produto", $img);
        $sql->bindValue(":novo_produto", $novoProduto);
        $sql->execute();

        return true;
    }

}