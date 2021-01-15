<?php
require_once "class/register_product.class.php";
$product = new Product;

if(isset($_POST["novo_produto"])){
    
    $_POST["novo_produto"] = 'Novo';
    $tituloProduto = utf8_decode(addslashes($_POST["titulo"]));
    $descricaoProduto = utf8_decode(addslashes($_POST["descricao"]));
    $precoProduto = utf8_decode(addslashes($_POST["preco"]));
    $imgProduto = utf8_decode(addslashes($_FILES["fileUpload"]["name"]));
    $novoProduto = utf8_decode(addslashes($_POST["novo_produto"]));
    $idProduto = $_POST["id-produto"];
    $qtd = $_POST["qtd"];

    $updateOk = $product->updateProduct($tituloProduto, $descricaoProduto, $precoProduto, $imgProduto, $novoProduto, $idProduto, $qtd);

    if($updateOk){
        echo '
            <script>
                alert("Produto atualizado com sucesso")
                window.location.href = "http://localhost/projetos/e-commerce/AdminLTE/index.php"
            </script>
        ';
    }
}else{

    $_POST["novo_produto"] = '';
    $tituloProduto = utf8_decode(addslashes($_POST["titulo"]));
    $descricaoProduto = utf8_decode(addslashes($_POST["descricao"]));
    $precoProduto = utf8_decode(addslashes($_POST["preco"]));
    $imgProduto = utf8_decode(addslashes($_FILES["fileUpload"]["name"]));
    $novoProduto = utf8_decode(addslashes($_POST["novo_produto"]));
    $idProduto = $_POST["id-produto"];
    $qtd = $_POST["qtd"];

    $updateOk = $product->updateProduct($tituloProduto, $descricaoProduto, $precoProduto, $imgProduto, $novoProduto, $idProduto, $qtd);

    if($updateOk){
        echo '
            <script>
                alert("Produto atualizado com sucesso")
                window.location.href = "http://localhost/projetos/e-commerce/AdminLTE/index.php"
            </script>
        ';
    }
}




if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    if($_FILES["fileUpload"]["error"]){
  
      throw new Exception("Error: ".$_FILES["fileUpload"]["error"]);
  
    }
  
    $dirUploads = "arquivoproduto";
  
    if(!is_dir($dirUploads)){
  
      mkdir($dirUploads);
  
    }
  
    $largura = "1600";
    $altura = "1067";
      
      switch($_FILES["fileUpload"]['type']):
          case 'image/jpeg';
          case 'image/pjpeg';
      $imagem_temporaria = imagecreatefromjpeg($_FILES["fileUpload"]['tmp_name']);
      
      $largura_original = imagesx($imagem_temporaria);
      
      $altura_original = imagesy($imagem_temporaria);
      
      $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
      
      $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
      
      $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
      imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
      
      imagejpeg($imagem_redimensionada, 'arquivoproduto/' . $_FILES["fileUpload"]['name']);
  
      break;
          
          //Caso a imagem seja extensão PNG cai nesse CASE
          case 'image/png':
          case 'image/x-png';
              $imagem_temporaria = imagecreatefrompng($_FILES["fileUpload"]['tmp_name']);
              
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
        imagepng($imagem_redimensionada, 'arquivoproduto/' . $_FILES["fileUpload"]['name']);
              
          break;
    endswitch;
  
    }else{
  
      throw new Exception("Erro no upload");
  
    }