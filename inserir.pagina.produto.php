<?php
require_once "class/register_product.class.php";
$product = new Product;

if(isset($_POST["specify"], $_POST["dimensions"], $_POST["buy-info"])){
    
    $specify = utf8_decode(addslashes($_POST["specify"]));
    $dimensions = utf8_decode(addslashes($_POST["dimensions"]));
    $buyInfo = utf8_decode(addslashes($_POST["buy-info"]));
    $idProduto = utf8_decode(addslashes($_POST["id"]));

    $product->insertDetailsProduct($idProduto, $specify, $dimensions, $buyInfo);
}

if(isset($_FILES["filesUpload"])){

    $idProduto = utf8_decode(addslashes($_POST["id"]));
    
    for($i = 0; $i < count($_FILES["filesUpload"]["name"]); $i++){
        $imgs = $_FILES["filesUpload"]["name"][$i];

        $insertPageProduct = $product->insertCarroussel($idProduto, $imgs);
        
        if($insertPageProduct){
            echo '
                <script>
                    alert("Produto cadastrado com sucesso")
                    window.location.href = "http://localhost/projetos/e-commerce/AdminLTE/index.php"
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("Erro ao cadastrar o produto")
                    window.location.href = "http://localhost/projetos/e-commerce/AdminLTE/index.php"
                </script>
            ';
        }


        if($_SERVER["REQUEST_METHOD"] == "POST"){
  
            if($_FILES["filesUpload"]["error"][$i]){
          
              throw new Exception("Error: ".$_FILES["filesUpload"]["error"][$i]);
          
            }
          
            $dirUploads = "carroussel-img";
          
            if(!is_dir($dirUploads)){
          
              mkdir($dirUploads);
          
            }
          
            $largura = "1114";
            $altura = "1300";
              
              switch($_FILES["filesUpload"]['type'][$i]):
                  case 'image/jpeg';
                  case 'image/pjpeg';
              $imagem_temporaria = imagecreatefromjpeg($_FILES["filesUpload"]['tmp_name'][$i]);
              
              $largura_original = imagesx($imagem_temporaria);
              
              $altura_original = imagesy($imagem_temporaria);
              
              $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
              
              $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
              
              $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
              imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
              
              imagejpeg($imagem_redimensionada, 'carroussel-img/' . $_FILES["filesUpload"]['name'][$i]);
          
              break;
                  
                  //Caso a imagem seja extensão PNG cai nesse CASE
                  case 'image/png':
                  case 'image/x-png';
                      $imagem_temporaria = imagecreatefrompng($_FILES["filesUpload"]['tmp_name'][$i]);
                      
                      $largura_original = imagesx($imagem_temporaria);
                      $altura_original = imagesy($imagem_temporaria);
                      
                      /* Configura a nova largura */
                      $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);
          
                      /* Configura a nova altura */
                      $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);
                      
                      /* Retorna a nova imagem criada */
                      $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
                      
                      /* Copia a nova imagem da imagem antiga com o tamanho correto */
                      //imagealphablending($imagem_redimensionada, false);
                      //imagesavealpha($imagem_redimensionada, true);
          
                      imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
                      
                      //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
                imagepng($imagem_redimensionada, 'carroussel-img/' . $_FILES["filesUpload"]['name'][$i]);
                      
                  break;
            endswitch;
          
            }else{
          
              throw new Exception("Erro no upload");
          
            }
    }
    
}