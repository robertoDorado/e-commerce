<?php
require_once "conection.class.php";

class Product {

    use Conection;

    public function cadastrarProduto($titulo, $descricao, $preco, $img, $novoProduto, $qtd){
        $sql = 'INSERT INTO register_product SET titulo_produto = :titulo_produto,
        descricao_produto = :descricao_produto, preco_produto = :preco_produto,
        img_produto = :img_produto, novo_produto = :novo_produto,
        status_produto = :status_produto, qtd = :qtd';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":titulo_produto", $titulo);
        $sql->bindValue(":descricao_produto", $descricao);
        $sql->bindValue(":preco_produto", $preco);
        $sql->bindValue(":img_produto", $img);
        $sql->bindValue(":novo_produto", $novoProduto);
        $sql->bindValue(":status_produto", 1);
        $sql->bindValue(":qtd", $qtd);
        $sql->execute();

        return true;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM register_product";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function updateProduct($titulo_Produto, $descricao_produto, $preco_produto, $img_produto, $novo_produto, $id, $qtd){
        $sql = "UPDATE register_product SET titulo_produto = :titulo_produto,
        descricao_produto = :descricao_produto, preco_produto = :preco_produto,
        img_produto = :img_produto, novo_produto = :novo_produto, qtd = :qtd WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":titulo_produto", $titulo_Produto);
        $sql->bindValue(":descricao_produto", $descricao_produto);
        $sql->bindValue(":preco_produto", $preco_produto);
        $sql->bindValue(":img_produto", $img_produto);
        $sql->bindValue(":novo_produto", $novo_produto);
        $sql->bindValue(":qtd", $qtd);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;

    }

    public function getProductName($id){
        $sql = "SELECT titulo_produto FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getProductDescription($id){
        $sql = "SELECT descricao_produto FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getProductPrice($id){
        $sql = "SELECT preco_produto FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getProductImg($id){
        $sql = "SELECT img_produto FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }


    public function getProductTagNew($id){
        $sql = "SELECT novo_produto FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function getProductQtd($id){
        $sql = "SELECT qtd FROM register_product WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    public function fakeDeleteProduct($id){
        $sql = "UPDATE register_product SET status_produto = 0 WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    public function restoreStatus($id){
        $sql = "UPDATE register_product SET status_produto = 1 WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }



    public function insertCarroussel($idProduto, $imgs){
            $sql = "INSERT INTO product_page_carroussel SET id_produto = :id_produto, imgs = :imgs";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_produto", $idProduto);
            $sql->bindValue(":imgs", $imgs);
            $sql->execute();
    
            return true;

    }

    public function insertDetailsProduct($idProduto, $specify, $dimensions, $buyInfo){
        if(!$this->updateAlreadyProductExist($idProduto, $specify, $dimensions, $buyInfo)){
            $sql = "INSERT INTO product_page_details SET id_produto = :id_produto, specify = :specify,
            dimensions = :dimensions, buy_info = :buy_info";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_produto", $idProduto);
            $sql->bindValue(":specify", $specify);
            $sql->bindValue(":dimensions", $dimensions);
            $sql->bindValue(":buy_info", $buyInfo);
            $sql->execute();
    
            return true;
        }

    }

    private function updateAlreadyProductExist($idProduto, $specify, $dimensions, $buyInfo){
        $sql = "SELECT * FROM product_page_details WHERE id_produto = :id_produto";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_produto", $idProduto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = "UPDATE product_page_details SET specify = :specify,
            dimensions = :dimensions, buy_info = :buy_info WHERE id_produto = :id_produto";
            $sql = $this->pdo->prepare($sql);
          
            $sql->bindValue(":id_produto", $idProduto);
            $sql->bindValue(":specify", $specify);
            $sql->bindValue(":dimensions", $dimensions);
            $sql->bindValue(":buy_info", $buyInfo);
            $sql->execute();

            return true;

        }
    }

    

}