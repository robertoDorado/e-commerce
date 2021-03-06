<?php
require_once "class/carrinho.class.php";
require_once "vendor/autoload.php";
require_once "class/config_pag_seguro.php";
require_once "class/user.class.php";
require_once "class/info_pagseguro.class.php";
require_once "class/register_product.class.php";
$user = new User;
$cart = new Cart;
$pagamentos = new Pagamentos;
$produto = new Product;

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

if(isset($_GET['idUser'])){

    $idUser = $_GET['idUser'];
    $nome = utf8_decode($_GET['name']);
    $email = $_GET['email'];
    $celular = $_GET['phone'];
    $endereco = utf8_decode($_GET['address']);
    $numberAddress = $_GET['numberAddress'];
    $bairro = utf8_decode($_GET['district']);
    $cep = $_GET['cep'];
    $complemento = utf8_decode($_GET['complemento']);
    $cidade = utf8_decode($_GET['city']);
    $estado = $_GET['estado'];
    $parcela = $_GET['parcela'];

    $pagamentos->checkoutCreditCard($idUser, $nome, $email, $celular, $cep, $endereco, $bairro, $numberAddress, $complemento, $cidade, $estado, $parcela);

    $items = $cart->getList();

    foreach($items as $products){

        $idCompra = $products['id'];
        $qtdCompra = $products['qtd'];
        $pagamentos->insertPurchaseCart($idUser, $idCompra, $qtdCompra);
    }

    $_SESSION['cart'] = array();

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
        <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

    </head>

    <nav id="menu1" class="bar menu-principal bar-1 hidden-xs pos-fixed">
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
                                                <div class="dropdown__content col-lg-2">
                                                    <ul class="menu-vertical">
                                                        <li><span style="color:black;font-weight:bold;">Acessórios Femininos</span></li>
                                                        <li> <a href="#">Anéis</a> </li>
                                                        <li> <a href="#">Brincos</a> </li>
                                                        <li> <a href="#">Bolsas</a> </li>
                                                        <li> <a href="#">Bonés e Chapéus</a> </li>
                                                    </ul>
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
        

        <!-- Responsive Nav -->

        <div class="nav-container hidden-md hidden-lg">
            <div>
                <nav class="bar bar-toggle">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="bar__module">
                                    <a href="index.html"> <img class="logo logo-dark" alt="logo" src="img/logo/logo-1.png"> <img class="logo logo-light" alt="logo" src="img/logo/logo-1.png"> </a>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <div class="bar__module">
                                    <a class="menu-toggle pull-right" href="#" data-notification-link="sidebar-menu"> <i class="stack-interface stack-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="notification pos-right pos-top side-menu bg--white" data-notification-link="sidebar-menu" data-animation="from-right">
                    <div class="side-menu__module pos-vertical-center text-right">
                    <ul class="menu-horizontal text-left">
                                        <li class="h4"> <a href="index.php">
                                        Home
                                    </a> </li>
                                        <li class="dropdown"> <span class="dropdown__trigger h4">
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
                                        <li class="h4"> <a href="#">
                                        Novidades
                                    </a> </li class="h4">
                                        <li class="h4"> <a href="#">
                                        Beleza & Saúde
                                    </a> </li>
                                        <li class="h4"> <a href="#">
                                        Lingerie
                                    </a> </li>
                                        <li class="h4"> <a href="#">
                                        Fitness
                                    </a> </li>
                                        <li class="dropdown"> <span class="dropdown__trigger h4" style="margin-bottom:0;">
                                        Nossas Ofertas
                                    </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="dropdown__content col-lg-2">
                                                    <ul class="menu-vertical">
                                                        <li><span style="color:black;font-weight:bold;">Acessórios Femininos</span></li>
                                                        <li> <a href="#">Anéis</a> </li>
                                                        <li> <a href="#">Brincos</a> </li>
                                                        <li> <a href="#">Bolsas</a> </li>
                                                        <li> <a href="#">Bonés e Chapéus</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php if(isset($_SESSION['user_client'])):?>
                        <div class="bar__module">
                            <a class="btn btn--sm btn--primary type--uppercase" href="login-client.php"> <span class="btn__text">
                                <?php foreach ($data as $newData):?>
                                    Olá <?php echo $newData['nome']; ?>
                                <?php endforeach; ?>
                        </span> </a>
                        </div>
                        <a style="border:none;color:white;width:100%;font-weight:bold;" class="btn btn--primary" href="sair-client.php">Sair</a><br>
                        <a href="carrinho.php" style="margin-right:130px;"><i class="fa fa-shopping-cart select-cart"></i></a>
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
                    <div class="side-menu__module pos-bottom pos-absolute col-12 text-right">
                        <ul class="social-list list-inline list--hover">
                            <li><a href="#"><i class="socicon socicon-google icon icon--xs"></i></a></li>
                            <li><a href="#"><i class="socicon socicon-twitter icon icon--xs"></i></a></li>
                            <li><a href="#"><i class="socicon socicon-facebook icon icon--xs"></i></a></li>
                            <li><a href="#"><i class="socicon socicon-instagram icon icon--xs"></i></a></li>
                        </ul>
                    </div>
                </div>
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
            @media screen and (max-width:700px){
                .select-cart{
                    position:relative;
                }
                .item-cart{
                    position:absolute;
                    top:456px;
                    right:146px;
                    color:white !important;
                }
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
                background:#fff;
            }
            #menu1{
                -webkit-box-shadow: 1px 8px 18px 0px rgba(0,0,0,0.29); 
                box-shadow: 1px 8px 18px 0px rgba(0,0,0,0.29);
            }
        </style>

<body class="dropdowns--hover" data-smooth-scroll-offset="77">

        <section class="text-center select--compra-realizada">
            <div class="logo text-center"> <a href="index.html" title="Oxyy"><img src="img/logo/logo-meraki-admin.png" alt="meraki"></a> </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8">
                        <h1>Compra Realizada com Sucesso</h1>
                        <p class="lead"> A seu compra foi realizada com sucesso, clique no link abaixo para acompanhar o seu pedido!</p>
                    </div>
                </div>
                <a href="#">Acompanhar pedido</a>
            </div>
        </section>

        <style>
            .select--compra-realizada{
                margin-top:50px;
            }
            @media screen and (max-width:700px){
                .select--compra-realizada{
                    margin-top:0 !important;
                }
            }
        </style>

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


    <!-- <script src="js/jquery-3.1.1.min.js"></script> -->
    <script src="js/flickity.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/scripts.js"></script>
    




</html>

<script>
  window.history.replaceState({}, "Hide", "http://localhost/projetos/e-commerce/compra-realizada-com-sucesso.php")
</script>


<style>
    .second-part{
        background-color:rgb(248, 248, 248);
        margin-top:-10px;
    }
    footer{
        background-color:rgb(248, 248, 248);
    }
</style>
