<?php
require_once "conection.class.php";
class NewProductsJson{

    use Conection;

    public function getNewProducts(){
        $sql = "SELECT * FROM register_product ORDER BY id DESC";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }  
    }
}

$productJson = new NewProductsJson;
$arrayFormat = $productJson->getNewProducts();

$returnJson = array_map('encode_all_strings', $arrayFormat);

function encode_all_strings($arr) {
    foreach($arr as $key => $value) {
        $arr[$key] = utf8_encode($value);
    }
    return $arr;
}

echo json_encode($returnJson);