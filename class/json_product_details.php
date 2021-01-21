<?php
require_once "conection.class.php";

class JsonProductDetails {

    use Conection;

    public function getAllDetails(){
        $sql = "SELECT * FROM product_page_details";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}

$details = new JsonProductDetails;
$arrayFormat = $details->getAllDetails();

$returnJson = array_map('encode_all_strings', $arrayFormat);

function encode_all_strings($arr) {
    foreach($arr as $key => $value) {
        $arr[$key] = utf8_encode($value);
    }
    return $arr;
}

echo json_encode($returnJson);