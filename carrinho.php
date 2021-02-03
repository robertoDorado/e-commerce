<?php
require_once "class/register_product.class.php";
require_once "class/user.class.php";
require_once "class/carrinho.class.php";
$user = new User;
$cart = new Cart;

if(isset($_POST['cep'])){
        
    $cep = $_POST['cep'];

    $cepFormat = str_replace("-", "", $cep);

    $frete = $cart->calcularFrete($cepFormat);
}

if(isset($_POST['qtd'], $_POST['id'])){

    $id = $_POST['id'];
    $qtd = $_POST['qtd'];

    
    if(!isset($_SESSION['cart'][$id])){
        
        if(isset($_SESSION['cart'][$id])){
            
            $_SESSION['cart'][$id] += $qtd;
        }else{
            $_SESSION['cart'][$id] = $qtd;
        }
    }

}

if(!isset($_SESSION['cart']) || (isset($_SESSION['cart']) && count($_SESSION['cart']) == 0)){

    $_SESSION['cart'] = array();
}

if(isset($_SESSION['user_client'])){

    $id = $_SESSION['user_client'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $user->getIdIpCostumer($id, $ip);

    if(isset($id) && !empty($id)){

        $data = $user->getUsersCostumers($id);
    }


}else{
    header("Location: index.php");
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
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

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
                                <?php $items = $cart->getList();?>
                                    <?php if($items):?>
                                    <span class="item-cart"><?php echo count($items);?></span>
                                    <?php else:?>
                                        <span class="item-cart">0</span>
                                <?php endif;?>
                                    <?php else:?>
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
            

            <section class="space--xs imagebg select-imgbg" data-overlay="4">
                <div class="background-image-holder bg-holder"> <img alt="background" src="img/recruitment-2.jpg"> </div>
                <div class="container">
                    <div class="cta cta--horizontal text-center-xs row">
                        <div class="col-md-12">
                        <div class="caminho">
                            <a href="index.php"><i class="fas fa-home select-home"></i></a><h4 class="h4-sub">/Carrinho de compras</h4>
                        </div>
                            <h1>Carrinho de Compras</h1>
                        </div>
                    </div>
                </div>
            </section>

            <?php $items = $cart->getList(); ?>
            <?php if($items):?>
                <section style="display:none;">
                <div class="container">
                <div class="col-md-12">
                    <h4>0 produtos no carrinho</h4>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 area"  align="center">
                            <i class="fa fa-shopping-cart item" aria-hidden="true"></i>
                            <p>Seu carrinho está vazio. Continue comprando para encontrar um produto!</p>
                            <a class="btn btn-danger btn-compra" href="index.php">Continuar Comprando</a>
                        </div>
                    </div>  
                </div>
            </section>
            <?php else:?>
            <section>
                <div class="container">
                    <div class="col-md-12">
                        <h4>0 produtos no carrinho</h4>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 area"  align="center">
                            <i class="fa fa-shopping-cart item" aria-hidden="true"></i>
                            <p>Seu carrinho está vazio. Continue comprando para encontrar um produto!</p>
                            <a class="btn btn-danger btn-compra" href="index.php">Continuar Comprando</a>
                        </div>
                    </div>  
                </div>
            </section>
            <?php endif;?>

            <?php if($items):?>
                <div style="margin-top:20px;" class="container">
                    <h2>Seu Carrinho</h2>
                </div>
                <section style="padding-top:0;">
                    <div class="container">
                        <?php foreach($items as $cartItem):?>
                        <div class="col-md-12" style="margin-top:10px;">
                        <div class="area-product row">
                            <img src="arquivoproduto/<?php echo $cartItem['img']; ?>" alt="produto-meraki">
                            <div class="text-product">
                                <h4><?php echo $cartItem['title'];?></h4>
                                <div class="description-product">
                                    <p><?php echo $cartItem['description'];?></p>
                                </div>
                            </div>
                            <div class="links">
                                <a class="btn btn-danger btn-remover" href="<?php echo "unset-cart.php?id=".$cartItem['id']."&qtd=".$cartItem['qtd']; ?>">Remover do Carrinho</a>
                                <div class="item-price-tag">
                                    <span class="price-item"><?php echo $cartItem['price']; ?></span>
                                    <i class="fas fa-tags tag-price"></i>
                                    <span class="qtd-product">Qtd: <?php echo $cartItem['qtd'];?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="container">
                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-12 col-xs-12 col-12 col-sm-12" align="center">
                                <span class="subtotal"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($_POST['cep'])):?>
                <div class="container">
                    <div class="row" style="padding-top:10px;">
                        <div class="col-md-12 col-xs-12 col-12 col-sm-12" align="center">
                            <span class="frete">Frete: <?php echo "R$ ".$frete->Valor." ($frete->PrazoEntrega dias)";?></span>
                        </div>
                    </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-12 col-xs-12 col-12 col-sm-12" align="center">
                                <span class="total"></span>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-12 col-xs-12 col-12 col-sm-12" align="center">
                                <form action="formas-de-pagamento.php" method="POST">
                                    <select name="pagamentos" id="pagamentos" style="width:30%;">
                                        <option value="0" disabled selected>Selecione uma forma de pagamento</option>
                                        <option value="checkout_transparente">PagSeguro Checkout Transparente</option>
                                    </select><br>
                                    <input type="hidden" name="total-a-pagar" id="total-a-pagar">
                                    <button style="width:30%;border:none;margin-top:10px;" type="submit" class="btn btn-success">Comprar agora!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                
                
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST">
                            <div class="form-group">
                                <h4 style="margin-bottom:20px;">Calculo do frete</h4>
                                <label for="cep">Seu CEP:</label><br>
                                <input data-js="cep" style="width:200px;" class="form-control select-input-cep" type="text" name="cep" id="cep">
                                <button style="border:0; width:200px;" class="btn btn-danger form-control" type="submit">Calcular</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
                <?php else:?>
            <section style="display:none;">
                <div class="container">
                    <div class="col-md-12">
                        <h4>Seu Carrinho</h4>
                        <div class="area-product row">
                            <img src="arquivoproduto/agency-1.jpg" alt="produto-meraki">
                            <div class="text-product">
                                <h4>Titulo do Produto</h4>
                                <div class="description-product">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                            <div class="links">
                                <a class="btn btn-danger btn-remover" href="#">Remover do Carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif;?>

            <script>
                const masks = {
                    cep(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{5})(\d)/, '$1-$2')
                        .replace(/(-\d{3})\d+?$/, '$1')
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
                .subtotal{
                    color:#ec5252;
                    font-weight:bold;
                    font-size:20px;
                    padding-top:17px;
                }
                .frete{
                    color:#ec5252;
                    font-weight:bold;
                    font-size:20px;
                    padding-top:17px;
                }
                .total{
                    color:#ec5252;
                    font-weight:bold;
                    font-size:20px;
                    padding-top:17px;
                }
            </style>

            <script>
                const xmlCart = new XMLHttpRequest;

                xmlCart.onreadystatechange = () => {
                    if(xmlCart.readyState == 4 && xmlCart.status == 200){

                        const objectCart = JSON.parse(xmlCart.response)
                        
                        let subtotal = 0

                        objectCart.map(($objectCart) => {

                            let price = $objectCart.price.substr(2)

                            price = price.replace(".", "")

                            price = price.replace(",", ".")

                            price = parseFloat(price)

                            let qtd = parseInt($objectCart.qtd)

                            subtotal += (price * qtd)

                        })

                        let brlMoneyFormat = subtotal.toLocaleString('pt-br', {minimumFractionDigits: 2});
                        
                        document.querySelector('.subtotal').innerHTML = `Subtotal: R$ ${brlMoneyFormat}`

                        const stringFrete = document.querySelector('.frete').innerText

                        let numberFormatFrete = stringFrete.substr(9);

                        numberFormatFrete = numberFormatFrete.replace(",", ".")

                        numberFormatFrete = parseFloat(numberFormatFrete)

                        let totalAPagarPelaCompra = subtotal + numberFormatFrete

                        const brlFormatTotalAPagar = totalAPagarPelaCompra.toLocaleString('pt-br', {minimumFractionDigits: 2});

                        document.querySelector('.total').innerHTML = `Total: R$ ${brlFormatTotalAPagar}`

                        document.querySelector('#total-a-pagar').value = totalAPagarPelaCompra
                    }
                }

                xmlCart.open('GET', 'http://localhost/projetos/e-commerce/class/json_cart.class.php')
                xmlCart.send()
            </script>


            

           

            <style>
                .qtd-product{
                    float:right;
                    color:#ec5252;
                    font-weight:bold;
                }
                .item-price-tag{
                    margin-top:10px;
                }
                .tag-price{
                    color:#ec5252;
                }
                .price-item{
                    color:#ec5252;
                    font-weight:bold;
                    font-size:20px;
                }
                .links a{
                    display:block;
                    margin:0 !important;
                    margin-top:20px !important;
                }
                .btn-adicionar{
                    color:white;
                    border:none;
                }
                .btn-remover{
                    border:none;
                }
                .description-product{
                    overflow:hidden;
                    height:70px;
                    width:500px;
                    margin:0;
                }
                .text-product{
                    margin-left:50px;
                }
                .text-product h4{
                    margin-top:1%;
                }
                .area-product{
                    width:100%;
                    height:150px;
                    border: 1px solid #e8e9eb;
                    border-radius:5px;
                }
                .area-product img{
                    height:100%;
                    width:250px;
                }
                .btn-compra{
                    border:none;
                }
                .area{
                    width:100%;
                    height:270px;
                    border: 1px solid #e8e9eb;
                    border-radius:5px;
                }
                .item{
                    font-size:120px;
                    margin-top:2%;
                    color:#e8e9eb;
                }
            </style>

            <style>
                .h4-sub{
                    margin-left:10px !important;
                }
                .select-home{
                    font-size:20px;
                    color:#ffff;
                    margin-top:5px;
                }
                .caminho{
                    display:flex;
                }
                .select-imgbg{
                    margin-top:100px;
                    z-index:1;
                }
                .select-imgbg .bg-holder{
                    background-position: 100% 21% !important;
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


    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/flickity.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/scripts.js"></script>




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