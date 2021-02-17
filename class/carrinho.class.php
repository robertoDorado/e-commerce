<?php
require_once "conection.class.php";
class Cart{

    use Conection;

    private function getProductInfo($id){
        $array = array();

        $sql = "SELECT * FROM register_product WHERE id = :id";
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
        
        if(!empty($cart)){
            
            foreach($cart as $id => $qtd){
                
                if($this->getProductInfo($id)){
                    
                $info = $this->getProductInfo($id);
    
                $array[] = array(
                    'id' => $id,
                    'qtd' => $qtd,
                    'title' => utf8_encode($info['titulo_produto']),
                    'price' => $info['preco_produto'],
                    'img' => $info['img_produto'],
                    'description' => utf8_encode($info['descricao_produto']),
                    'weight' => $info['peso'],
                    'width' => $info['largura'],
                    'height' => $info['altura'],
                    'length' => $info['comprimento'],
                    'diameter' => $info['diametro']

                );
            }

        }
        
    }else{

        $cart = array();
    }
        return $array;
    }

    public function delCartItem($id, $qtd){
        if(isset($id)){
            unset($_SESSION['cart'][$id]);
            
            $resultQtd = $qtd - 1;
            
            $_SESSION['cart'][$id] = $resultQtd;
            
            if($resultQtd == 0){

                unset($_SESSION['cart'][$id]);
            }
        }
    }

    public function calcularFrete($cepDestino){

        $list = $this->getList();

        $nVlPeso = 0;
        $nVlLargura = 0;
        $nVlComprimento = 0;
        $nVlAltura = 0;
        $nVlDiametro = 0;
        $nVlValorDeclarado = 0;


        foreach($list as $item){

            $price = $item['price'];
            $priceFormat1 = str_replace("R$", "", $price);
            $priceFormat2 = floatval(str_replace(",", ".", $priceFormat1));

            $nVlPeso += floatval($item['weight']);
            $nVlComprimento += floatval($item['length']);
            $nVlLargura += floatval($item['width']);
            $nVlAltura += floatval($item['height']);
            $nVlDiametro += floatval($item['diameter']);
            $nVlValorDeclarado += ($priceFormat2 * $item['qtd']);
        }

        $soma = $nVlLargura + $nVlAltura + $nVlComprimento;

        if($soma > 200) {
            $nVlLargura = 66;
            $nVlComprimento = 66;
            $nVlAltura = 66;
        }
        
        if($nVlDiametro > 90){
            $nVlDiametro = 90;
        }

        if($nVlPeso > 50){
            $nVlPeso = 50;
        }

        if($nVlValorDeclarado > 3000){
            $nVlValorDeclarado = 3000;
        }


        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';
        $url .= 'nCdEmpresa=';
        $url .= '&nDsSenha=';
        $url .= '&sCepOrigem=' . $this->cepOrigem;
        $url .= '&sCepDestino=' . $cepDestino;
        $url .= '&nVlPeso=' . $nVlPeso;
        $url .= '&nVlLargura=' . $nVlLargura;
        $url .= '&nVlAltura=' . $nVlAltura;
        $url .= '&nCdFormato=1';
        $url .= '&nVlComprimento=' . $nVlComprimento;
        $url .= '&sCdMaoPropria=n';
        $url .= '&nVlValorDeclarado=' . $nVlValorDeclarado;
        $url .= '&sCdAvisoRecebimento=n';
        $url .= '&nCdServico=41106';
        $url .= '&nVlDiametro=' . $nVlDiametro;
        $url .= '&StrRetorno=xml';

        $xml = simplexml_load_file($url);


        return $xml->cServico;
    }
}