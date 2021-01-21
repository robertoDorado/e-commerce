<?php
require_once "conection.class.php";

class ProductCarrousselImgs {

    use Conection;

    public function getCarrousselImages(){
        $sql = "SELECT * FROM product_page_carroussel";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}

$productCarroussel = new ProductCarrousselImgs;

$arrayProduct = $productCarroussel->getCarrousselImages();

$jsonFormat = json_encode($arrayProduct);

echo $jsonFormat;