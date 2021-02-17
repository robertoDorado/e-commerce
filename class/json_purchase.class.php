<?php
require_once "conection.class.php";

class dataCostumer {

    use Conection;

    public function selectdataCostumer(){
        $sql = "SELECT * FROM purchase";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}

$data = new dataCostumer;

$information = $data->selectdataCostumer();

$returnArray = array_map('encode_all_strings', $information);

function encode_all_strings($arr){
    foreach($arr as $key => $value){
        $arr[$key] = utf8_encode($value);
    }

    return $arr;
}

echo json_encode($returnArray);