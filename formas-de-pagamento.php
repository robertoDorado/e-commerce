<?php
require_once "class/carrinho.class.php";
require_once "vendor/autoload.php";
require_once "class/config_pag_seguro.php";
require_once "class/user.class.php";
$user = new User;
$cart = new Cart;

if(isset($_SESSION['user_client'])){

    $id = $_SESSION['user_client'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $user->getIdIpCostumer($id, $ip);

    if(isset($id) && !empty($id)){
        $data = $user->getUsersCostumers($id);
    }
}

if(isset($_POST['email']) && isset($_POST['password'])){

    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['password']));

    $login = $user->loginUserCostumer($email, $senha);

    if(!$login){
        header("Location: login-client.php?erro");
    }else{
        header("Location:index.php");
    }
}

if(isset($_POST['pagamentos'])){

    try{

        $sessionCode = \PagSeguro\Services\Session::create(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

        $dados['sessionCode'] = $sessionCode->getResult();

    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
        exit;
    }
}else{

    header("Location: carrinho.php");
}
?>

<!DOCTYPE html>
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

    <nav id="menu1" class="bar menu-principal bar-1 hidden-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1 col-md-2 hidden-xs">
                                <div class="bar__module">
                                    <a href="index.php"> <img  class="logo logo-dark" alt="logo" src="img/logo/logo-1.png"> <img  class="logo logo-light" alt="logo" src="img/logo/logo-1.png"> </a>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                                <div class="bar__module">
                                    <ul class="menu-horizontal text-left">
                                        <li> <a href="index.php">
                                        Home
                                    </a> </li>
                                        <li class="dropdown"> <span class="dropdown__trigger">
                                        Roupas
                                    </span>
                                            <div class="dropdown__container">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="dropdown__content col-lg-2">
                                                            <ul class="menu-vertical">
                                                                <li> <a href="#">Femininas</a> </li>
                                                                <li> <a href="#">Masculinas</a> </li>
                                                                <li> <a href="#">Infantis</a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li> <a href="#">
                                        Novidades
                                    </a> </li>
                                        <li> <a href="#">
                                        Beleza & Saúde
                                    </a> </li>
                                        <li> <a href="#">
                                        Lingerie
                                    </a> </li>
                                        <li> <a href="#">
                                        Fitness
                                    </a> </li>
                                        <li class="dropdown"> <span class="dropdown__trigger">
                                        Nossas Ofertas
                                    </span>
                                            <div class="dropdown__container">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="dropdown__content row w-100">
                                                            <div class="col-lg-3">
                                                                <h5>Acessórios Femininos</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Anéis</a> </li>
                                                                    <li> <a href="#">Brincos</a> </li>
                                                                    <li> <a href="#">Bolsas</a> </li>
                                                                    <li> <a href="#">Bonés e Chapéus</a> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5>Coleção Masculina</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Camisa</a> </li>
                                                                    <li> 
                                                                      <a href="#">Polo</a> 
                                                                      <ul class="submenu-masculina">
                                                                        <li><a href="#">Polo Básica</a></li>
                                                                        <li><a href="#">Polo Listrada</a></li>
                                                                        <li><a href="#">Polo Moda</a></li>
                                                                      </ul>
                                                                    </li>
                                                                    <li>
                                                                      <a href="#">Camisetas</a>
                                                                      <ul class="submenu-masculina">
                                                                        <li><a href="#">Camiseta básica</a></li>
                                                                        <li><a href="#">Camiseta estampada</a></li>
                                                                        <li><a href="#">Camiseta listrada</a></li>
                                                                      </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5>Moda Feminina</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Blusa</a> </li>
                                                                    <li> <a href="#">Body</a> </li>
                                                                    <li> <a href="#">Camisa</a> </li>
                                                                    <li> <a href="#">Camiseta</a> </li>
                                                                    <li> <a href="#">Vestido</a> </li>
                                                                    <li> <a href="#">Blazer</a> </li>
                                                                    <li> <a href="#">Casaco e Jaqueta</a> </li>
                                                                    <li> <a href="#">Cardigan</a> </li>
                                                                    <li> <a href="#">Moletom</a> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5>Beleza e Perfume</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Feminino</a> </li>
                                                                    <li> <a href="#">Masculino</a> </li>
                                                                    <li> <a href="#">Kit Feminino</a> </li>
                                                                    <li> <a href="#">Kit Masculino</a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <?php if(isset($_SESSION['user_client'])):?>
                                <div class="bar__module">
                                    <a class="btn btn--sm btn--primary type--uppercase" href="login-client.php"> <span class="btn__text">
                                        <?php foreach ($data as $newData):?>
                                            Olá <?php echo $newData['nome']; ?>
                                        <?php endforeach; ?>
                                </span> </a>
                                </div>
                                <a href="sair-client.php">Sair</a>
                                <a href="carrinho.php"><i class="fa fa-shopping-cart select-cart"></i></a>
                                <?php if(isset($_SESSION['cart'])):?>
                                <?php $items = $cart->getList();?>
                                <?php if($items):?>
                                    <span class="item-cart"><?php echo count($items); ?></span>
                                <?php else:?>
                                    <span class="item-cart">0</span>
                                <?php endif;?>
                                <?php endif;?>
                                <?php else: ?>
                                    <div class="bar__module">
                                    <a class="btn btn--sm btn--primary type--uppercase" href="login-client.php"> <span class="btn__text">
                                        Faça o seu Login!
                                </span> </a>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        

        <style>
            .item-cart{
                background:#4a90e2;
                color:white;
                margin:0;
                top:-18px;
                position:absolute;
                z-index:2;
                padding: .3rem 1rem;
                min-width: 1em;
                border-radius: 9999px;
                text-align: center;
                margin-left:25px;
            }
            .select-cart{
                opacity:1;
                color:#4a90e2;
                font-size:20px;
                cursor:pointer;
                position:absolute;
                margin-top:10px;
                margin:0;
                top:5px;
                margin-left:5px;
                font-size:25px;
            }
            .select-cart:hover{
                opacity:.7;
                transition:.5s;
            }
        </style>
        <style>
            .bar .logo{
              max-height:4em !important;
            }
            .submenu-masculina{
              margin-left:10px !important;
            }
            .menu-principal{
                background:#f7f4f4;
            }
            #menu1{
                -webkit-box-shadow: 1px 8px 18px 0px rgba(0,0,0,0.29); 
                box-shadow: 1px 8px 18px 0px rgba(0,0,0,0.29);
                position:fixed;
                z-index:2;
                width:100%;
                top:0;
            }
        </style>

<body class="dropdowns--hover" data-smooth-scroll-offset="77">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <?php if(isset($_SESSION['user_client'])):?>
                        <?php foreach($data as $newData): ?>
                    <form method="POST" style="margin-top:150px;">
                        <h3>Preencha os dados de Pagamento</h3>
                        <div class="form-group">
                            <label for="nome">Nome Completo:</label><br>
                            <input value="<?php echo $newData['nome']; ?>" style="width:300px;" class="form-control" type="text" name="nome" id="nome">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input style="width:300px;" type="email" name="email" id="email" value="<?php echo $newData['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Cpf">CPF:</label><br>
                            <input style="width:300px;" type="text" name="cpf" id="cpf">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha:</label><br>
                            <input style="width:300px;" type="password" name="password" id="password" value="<?php echo $newData['senha']; ?>">
                        </div>

                        <br>

                        <h3>Informações de Endereço:</h3>
                        <div class="form-group">
                            <label for="cep">CEP:</label><br>
                            <input style="width:300px;" type="text" name="cep" id="cep">
                        </div>

                        <div class="form-group">
                            <label for="rua">Rua:</label><br>
                            <input style="width:300px;" type="text" name="rua" id="rua" readonly>
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro:</label><br>
                            <input style="width:300px;" type="text" name="bairro" id="bairro" readonly>
                        </div>

                        <div class="form-group">
                            <label for="numero">Número:</label><br>
                            <input style="width:300px;" type="text" name="rua" id="rua">
                        </div>

                        <div class="form-group">
                            <label for="complemento">Complemento:</label><br>
                            <input style="width:300px;" type="text" name="complemento" id="complemento">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade:</label><br>
                            <input style="width:300px;" type="text" name="cidade" id="cidade" readonly>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado:</label><br>
                            <input style="width:300px;" type="text" name="estado" id="estado" readonly>
                        </div>

                        <h3>Informações de Pagamento:</h3>
                        <div class="form-group">
                            <label for="cartao">Número do Cartão:</label><br>
                            <input style="width:300px;" type="text" name="cartao" id="cartao">
                        </div>

                        <div class="form-group">
                            <label for="codigo">Código de seguraça: <small>(Fica no verso do cartão)</small></label><br>
                            <input style="width:300px;" type="text" name="codigo" id="codigo">
                        </div>

                        <div class="form-group">
                            <label for="validade">Validade:</label><br>
                            <select style="width:300px" name="validade" id="validade"></select>
                        </div>
                    </form>
                    <?php endforeach; ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
            
            <script>
                let option = "<option disabled selected>Selecione uma data</option>"
                document.getElementById('validade').innerHTML = option 
            </script>

          
            <script>
                const masks = {
                    telefone(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{2})(\d)/, '($1) $2')
                        .replace(/(\d{4})(\d)/, '$1-$2')
                        .replace(/-(\d{4})\d+?$/, '-$1')
                    },
                    celular(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{2})(\d)/, '($1) $2')
                        .replace(/(\d{5})(\d)/, '$1-$2')
                        .replace(/-(\d{4})\d+?$/, '-$1')
                    }
                }
                
                document.querySelectorAll('input').forEach(($input) => {
                    const field = $input.dataset.js

                    $input.addEventListener('input', (e) => {
                        e.target.value = masks[field](e.target.value)
                    }, false)
                })
            </script>

            <style>
                .btn-enviar{
                    background:black;
                }
                .btn-enviar:hover{
                    background:none;
                    border:1px solid black;
                    color:black !important;
                }
                textarea{
                    margin-top:20px;
                    margin-bottom:20px;
                    height:100px;
                }
            </style>

<!-- <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> -->

</body>

            <footer class="space--sm footer-2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-xs-6">
                            <h6 class="type--uppercase">Menu</h6>
                            <ul class="list--hover">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Roupas</a></li>
                                <li><a href="#">Novidades</a></li>
                                <li><a href="#">Novidades</a></li>
                                <li><a href="#">Beleza & Saúde</a></li>
                                <li><a href="#">Lingerie</a></li>
                                <li><a href="#">Fitness</a></li>
                                <li><a href="#">Nossas Ofertas</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-6">
                            <h6 class="type--uppercase">Roupas</h6>
                            <ul class="list--hover">
                                <li><a href="#">Femininas</a></li>
                                <li><a href="#">Masculinas</a></li>
                                <li><a href="#">Infantis</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-6">
                            <h6 class="type--uppercase">Support</h6>
                            <ul class="list--hover">
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Live Chat</a></li>
                                <li><a href="#">Downloads</a></li>
                                <li><a href="#">Press Kit</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-6">
                            <h6 class="type--uppercase">Locations</h6>
                            <ul class="list--hover">
                                <li><a href="#">Melbourne</a></li>
                                <li><a href="#">London</a></li>
                                <li><a href="#">New York</a></li>
                                <li><a href="#">San Francisco</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"> <span class="type--fine-print">© <span class="update-year"></span> Stack Inc.</span> <a class="type--fine-print" href="#">Privacy Policy</a> <a class="type--fine-print" href="#">Legal</a> </div>
                        <div class="col-sm-6 text-right text-left-xs">
                            <ul class="social-list list-inline list--hover">
                                <li><a href="#"><i class="socicon socicon-google icon icon--xs"></i></a></li>
                                <li><a href="#"><i class="socicon socicon-twitter icon icon--xs"></i></a></li>
                                <li><a href="#"><i class="socicon socicon-facebook icon icon--xs"></i></a></li>
                                <li><a href="#"><i class="socicon socicon-instagram icon icon--xs"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

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
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
        PagSeguroDirectPayment.setSessionId("<?php echo $dados['sessionCode']; ?>")
    </script>




</html>


<style>
    .second-part{
        background-color:rgb(248, 248, 248);
        margin-top:-10px;
    }
    footer{
        background-color:rgb(248, 248, 248);
    }
</style>
