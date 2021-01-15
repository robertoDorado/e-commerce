<?php 
require_once "class/user.class.php";
$user = new User;
    if(isset($_FILES["userPhoto"])){

        $nome = addslashes($_POST["nome"]);
        $email = addslashes($_POST["email"]);
        $senha = md5(addslashes($_POST["password"]));
        $img_user = $_FILES["userPhoto"]["name"];

        $user->cadastrar($nome, $email, $senha, $img_user);

    }

    
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    if($_FILES["userPhoto"]["error"]){
  
      throw new Exception("Error: ".$_FILES["userPhoto"]["error"]);
  
    }
  
    $dirUploads = "fileimguser";
  
    if(!is_dir($dirUploads)){
  
      mkdir($dirUploads);
  
    }
  
    $largura = "160";
    $altura = "160";
      
      switch($_FILES["userPhoto"]['type']):
          case 'image/jpeg';
          case 'image/pjpeg';
      $imagem_temporaria = imagecreatefromjpeg($_FILES["userPhoto"]['tmp_name']);
      
      $largura_original = imagesx($imagem_temporaria);
      
      $altura_original = imagesy($imagem_temporaria);
      
      $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
      
      $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
      
      $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
      imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
      
      imagejpeg($imagem_redimensionada, 'fileimguser/' . $_FILES["userPhoto"]['name']);
  
      break;
          
          //Caso a imagem seja extensão PNG cai nesse CASE
          case 'image/png':
          case 'image/x-png';
              $imagem_temporaria = imagecreatefrompng($_FILES["userPhoto"]['tmp_name']);
              
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
        imagepng($imagem_redimensionada, 'fileimguser/' . $_FILES["userPhoto"]['name']);
              
          break;
    endswitch;
  
    }else{
  
      throw new Exception("Erro no upload");
  
    }

    ?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Meraki</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/logo/logo-1.png" type="image/x-icon">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="shortcut icon" href="img/logo/logo.jpg" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700" rel="stylesheet">




        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700" rel="stylesheet">

    </head>


    
    <section class="text-center">
        <div class="logo text-center"> <a href="index.html" title="Oxyy"><img src="img/logo/logo-meraki-admin.png" alt="meraki"></a> </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <h1>Cadastro Realizado com Sucesso</h1>
                    <p class="lead"> O seu cadastro foi realizado com sucesso, clique no link abaixo para retornar a página de login!</p>
                </div>
            </div>
            <a href="login.php">Fazer o login</a>
        </div>
    </section>
    




    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/fontawesome.min.js"></script>


    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/flickity.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/scripts.js"></script>

</body>


</html>