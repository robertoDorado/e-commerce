<?php
require_once "class/register_product.class.php";
require_once "class/user.class.php";
require_once "class/carrinho.class.php";
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
                                <?php $items = $cart->getList(); ?>
                                <?php if($items):?>
                                    <span class="item-cart"><?php echo count($items);?></span>
                                <?php else: ?>
                                    <span class="item-cart">0</span>
                                <?php endif; ?>
                                <?php endif; ?>
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
                                                        <li><span style="color:black;font-weight:bold;font-size:1.2571em;">Acessórios Femininos</span></li>
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
<section class="space--lg">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-7 col-lg-6">
                            <div class="slider border--round boxed--border" data-paging="true" data-arrows="true">
                                <ul class="slides">
                                    <!-- <li> <img class="carroussel-img" alt="Image" src="img/product-single-2.jpg"> </li>
                                    <li> <img alt="Image" src="img/product-single-1.jpg"> </li>
                                    <li> <img alt="Image" src="img/product-single-3.jpg"> </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4 select--container-product">
                            <h2 class="select-title">Tivoli Model One</h2>
                            <div class="text-block"> <span style="display:none;" class="h4 type--strikethrough inline-block">$549.99</span> <span class="h4 inline-block select-price">$479</span> </div>
                            <p class="select-description"> Texto default </p>
                            <ul class="accordion accordion-2 accordion--oneopen select-ul">
                                <li>
                                    <div class="accordion__title"> <span class="h5">Especificações</span> </div>
                                    <div class="accordion__content">
                                        <p style="text-align:justify" class="specify-area">Texto default</p>
                                    </div>
                                </li>
                                <li class="active">
                                    <div class="accordion__title"> <span class="h5">Dimensões</span> </div>
                                    <div class="accordion__content">
                                        <p class="dimensions-area">Texto default</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="accordion__title"> <span class="h5">Informações de compra</span> </div>
                                    <div class="accordion__content">
                                        <p class="buy-info-area"> Texto default </p>
                                    </div>
                                </li>
                            </ul>
                            <?php if(isset($_SESSION['user_client'])):?>
                            <form method="POST" action="carrinho.php">
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-6 col-lg-4"> 
                                <input type="text" class="qtd" name="qtd" placeholder="QTD" readonly></div>
                                <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
                                <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                <div class="btn--add-item">
                                    <a href="#" style="color:white;" class="btn btn--primary btn-increment">+</a>
                                    <a href="#" style="color:white;" class="btn btn--primary btn-decrement">-</a>
                                </div>
                                <div class="col-lg-8"> <button type="submit" class="btn btn--primary">Adicionar ao Carrinho</button> </div>
                            </form>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </section>

           <style>
               .btn--add-item{
                    display:flex;
                    margin-left:16px;
                    padding-bottom:20px;
               }
            @media screen and (max-width:700px){
               .space--lg{
                    padding-top:0 !important;
               }
               .select--container-product{
                   margin-top:50px;
               }
               .btn--add-item{
                    margin-left:16px;
                    margin-right:16px;
                    display:block;
               }
               .btn--add-item a{
                    display:block;
               }

            }
           </style>
        

            <script>
                document.querySelectorAll('.accordion__title').forEach(($divAccordion) => {
                    $divAccordion.addEventListener('click', ($evt) => {
                        const liItem = $evt.target.parentNode.parentNode
                        liItem.classList.add('active')
                    })
                })
            </script>


            <!-- Requisição ajax do Produto -->
            <script>
                const xmlhttp = new XMLHttpRequest;

                xmlhttp.onreadystatechange = () => {
                    if(xmlhttp.status == 200 && xmlhttp.readyState == 4){
                        const objectProduct = JSON.parse(xmlhttp.response)
                        objectProduct.map(($objectProduct) => {


                            let query = location.search.slice(1);
                            let partes = query.split('&');
                            let data = {};
                            partes.forEach(function (parte) {
                                let chaveValor = parte.split('=');
                                let chave = chaveValor[0];
                                let valor = chaveValor[1];
                                data[chave] = valor;
                            });

                            if(data.id == $objectProduct.id){
                                
                                document.querySelector('.select-title').innerHTML = $objectProduct.titulo_produto
                                document.querySelector('.select-price').innerHTML = $objectProduct.preco_produto
                                document.querySelector('.select-description').innerHTML = $objectProduct.descricao_produto

                                let qtdNumber = 1
                                document.querySelector('.qtd').value = qtdNumber
                                document.querySelector('.btn-increment').addEventListener('click', (e) => {
                                    e.preventDefault()
                                    qtdNumber++
                                    document.querySelector('.qtd').value = qtdNumber
                                    if(qtdNumber > $objectProduct.qtd){
                                        qtdNumber = $objectProduct.qtd
                                        document.querySelector('.qtd').value = qtdNumber
                                    }
                                })

                                document.querySelector('.btn-decrement').addEventListener('click', (e) => {
                                    e.preventDefault()
                                    if(qtdNumber > 1){
                                        qtdNumber--
                                        document.querySelector('.qtd').value = qtdNumber
                                    }

                                })
                                
                                
                            }
                            
                        })
                    }
                }

                xmlhttp.open("GET", "http://localhost/projetos/e-commerce/class/json_new_product.class.php")
                xmlhttp.send()
            </script>



            <!-- Requisição ajax dos detalhes -->
            <script>
                const xmlDetails = new XMLHttpRequest;

                xmlDetails.onreadystatechange = () => {
                    if(xmlDetails.status == 200 && xmlDetails.readyState == 4){
                        
                        const objectDetails = JSON.parse(xmlDetails.response)

                        objectDetails.map(($objectDetails) => {

                            let query = location.search.slice(1);
                            let partes = query.split('&');
                            let data = {};
                            partes.forEach(function (parte) {
                                let chaveValor = parte.split('=');
                                let chave = chaveValor[0];
                                let valor = chaveValor[1];
                                data[chave] = valor;
                            });

                            if(data.id == $objectDetails.id_produto){

                                document.querySelector('.specify-area').innerHTML = $objectDetails.specify
                                document.querySelector('.dimensions-area').innerHTML = $objectDetails.dimensions
                                document.querySelector('.buy-info-area').innerHTML = $objectDetails.buy_info

                            }
                        })
                    }
                }

                xmlDetails.open("GET", "http://localhost/projetos/e-commerce/class/json_product_details.php")
                xmlDetails.send()
            </script>

            <!-- Requisição ajax do carrossel -->
            <script>
                const xmlCarroussel = new XMLHttpRequest;

                xmlCarroussel.onreadystatechange = () => {
                    if(xmlCarroussel.status == 200 && xmlCarroussel.readyState == 4){

                        const objectCarroussel = JSON.parse(xmlCarroussel.response)
                        
                        objectCarroussel.map(($objectCarroussel) => {


                            let query = location.search.slice(1);
                            let partes = query.split('&');
                            let data = {};
                            partes.forEach(function (parte) {
                                let chaveValor = parte.split('=');
                                let chave = chaveValor[0];
                                let valor = chaveValor[1];
                                data[chave] = valor;
                            });

                            if(data.id == $objectCarroussel.id_produto){
                                
                                const slides = document.querySelector('.slides')
                                const liItem = document.createElement('li')
                                const imgCarroussel = document.createElement('img')

                                slides.append(liItem)
                                liItem.append(imgCarroussel)

                                imgCarroussel.src = `carroussel-img/${$objectCarroussel.imgs}`
                                imgCarroussel.setAttribute("alt", "Image")
                            }
                        })
                    }
                }

                xmlCarroussel.open("GET", "http://localhost/projetos/e-commerce/class/json_product_carroussel.php")
                xmlCarroussel.send()
            </script>

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