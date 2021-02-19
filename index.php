<?php
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

<!DOCTYPE html>
<html lang="pt-br" class="js_active  vc_desktop  vc_transform" style="overflow-x:hidden;">
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

        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/home.css" media="screen">

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
                background:#f7f4f4;
            }
            #menu1{
                -webkit-box-shadow: 1px 8px 18px 0px rgba(0,0,0,0.29); 
                box-shadow: 1px 8px 18px 0px rgba(0,0,0,0.29);
            }
        </style>

<body class="dropdowns--hover" data-smooth-scroll-offset="77">

<section id="home-section" class="pb-0 pt-50 mt-90 banner-desk slider1">
			
            <!--
            #################################
                - THEMEPUNCH BANNER -
            #################################
            -->
            <div class="tp-banner-container">
                <div tp-banner class="tp-banner">
                    <ul>	<!-- SLIDE  -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/banner/banner-1.jpg" alt="Banner Linha Colors"  data-lazyload="img/banner/banner-1.jpg" 
                                data-lazyload="img/banner/banner-1.jpg"
                                data-bgposition="center top"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-duration="9000"
                                data-ease="Linear.easeNone"
                                data-scalestart="100"
                                data-scaleend="150"
                                data-blurstart="0"
                                data-blurend="0">
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0 tparrows"
                                data-x="0"
                                data-y="285" 
                                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="1000"
                                data-start="1200"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 8; max-width: auto; max-height:450px; white-space: nowrap;">
                            </div>

                        </li>
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/banner/banner-2.jpg" alt="Banner Linha Colors"  data-lazyload="img/banner/banner-2.jpg"
                                data-lazyload="img/banner/banner-2.jpg"
                                data-bgposition="center top"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-duration="9000"
                                data-ease="Linear.easeNone"
                                data-scalestart="100"
                                data-scaleend="150"
                                data-blurstart="0"
                                data-blurend="0">
                            <!-- LAYERS -->
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0 tparrows"
                                data-x="0"
                                data-y="285" 
                                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="1000"
                                data-start="1200"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 8; max-width: auto; max-height:450px; white-space: nowrap;">
                            </div>

                        </li>
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/banner/banner-3.jpg" alt="Banner Linha Colors"  data-lazyload="img/banner/banner-3.jpg"
                                data-lazyload="img/banner/banner-3.jpg"
                                data-bgposition="center top"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-duration="9000"
                                data-ease="Linear.easeNone"
                                data-scalestart="100"
                                data-scaleend="150"
                                data-blurstart="0"
                                data-blurend="0">                                <!-- LAYERS -->
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0 tparrows"
                                data-x="0"
                                data-y="285" 
                                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="1000"
                                data-start="1200"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 8; max-width: auto; max-height:450px; white-space: nowrap;">
                            </div>

                        </li>
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/banner/banner-1.jpg" alt="Banner Linha Colors"  data-lazyload="img/banner/banner-1.jpg"
                                data-lazyload="img/banner/banner-1.jpg"
                                data-bgposition="center top"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-duration="9000"
                                data-ease="Linear.easeNone"
                                data-scalestart="100"
                                data-scaleend="150"
                                data-blurstart="0"
                                data-blurend="0">                              <!-- LAYERS -->
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0 tparrows"
                                data-x="0"
                                data-y="285" 
                                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="1000"
                                data-start="1200"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 8; max-width: auto; max-height:450px; white-space: nowrap;">
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
        </section>


        <style>
            @media screen and (max-width:700px){
                #home-section{
                    padding-top:0;
                }
            }
        </style>

        
        <script>
                const tpBanner = document.querySelector('[tp-banner]')
                const leftArrow = document.createElement('div')
                leftArrow.classList.add('tp-leftarrow')
                leftArrow.classList.add('tparrows')
                leftArrow.classList.add('default')
                leftArrow.classList.add('round')
                leftArrow.classList.add('hidearrows')
                leftArrow.style.position = 'absolute'
                leftArrow.style.top = '225px'
                leftArrow.style.marginTop = '-20px'
                leftArrow.style.left = '20px'
                tpBanner.append(leftArrow)
                tpBanner.addEventListener('mouseover', () => {
                    leftArrow.classList.remove('hidearrows')
                    leftArrow.style.visibility = null
                })
                tpBanner.addEventListener('mouseout', () => {
                    leftArrow.classList.add('hidearrows')
                    leftArrow.style.visibility = 'hidden'
                })

                // Right Arrow
                const rightArrow = document.createElement('div')
                rightArrow.classList.add('tp-rightarrow')
                rightArrow.classList.add('tparrows')
                rightArrow.classList.add('default')
                rightArrow.classList.add('round')
                rightArrow.classList.add('hidearrows')
                rightArrow.style.position = 'absolute'
                rightArrow.style.top = '225px'
                rightArrow.style.marginTop = '-20px'
                rightArrow.style.right = '20px'
                tpBanner.append(rightArrow)
                tpBanner.addEventListener('mouseover', () => {
                    rightArrow.classList.remove('hidearrows')
                    rightArrow.style.visibility = null
                })
                tpBanner.addEventListener('mouseout', () => {
                    rightArrow.classList.add('hedearrows')
                    rightArrow.style.visibility = 'hidden'
                })
            </script>

          




          <style>
              .logo-img{
                  width:400px;
                  left:50%;
                  right:50%;
                  margin-left:auto;
                  margin-right:auto;
                  padding:0;
              }
              .dropdown-content{
                  width:150px;
                  height:auto;
                  position:absolute;
                  display:none;
                  background-color:white;
              } 
              .show{
                  display:block;
              }
              .dot{
                  width:10px;
                  height:10px;
                  border:1px solid black;
                  background:red;
                  border-radius:5px;
              }
              .lista-filtro li{
                  display:flex;
                  margin:0;
                  padding:0;
              }
          </style>



          
              
            <style>
            .lista-categoria li{
                display:inline-block;
                float:right;
            }
            .lista{
                margin-right:120px;
            }
            .lista-categoria li button{
                width:100px;
            }
            .lista-categoria li button:hover{
                border:none;
            }
            </style>


            <div class="boxed boxed--md container">
                <form class="form--horizontal row"  action="#" method="POST">
                <div class="col-md-5"></div>
                    <div class="col-md-4">
                        <div class="input-select">
                            <select name="filtro" id="select_lancamento">
                                <option value="0" disabled selected>Selecione uma Categoria</option>
                                <option value="1" class="todos_produtos">Todos os Produtos</option>
                                <option value="2" class="lancamento">Lançamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="buscar" id="buscar" placeholder="Buscar">
                    </div>
                    <!-- <div class="col-md-2">
                        <button type="submit" class="btn btn--primary">Buscar</button>
                    </div> -->
                </form>
            </div>

            <section id="json-search" class="json-search">
                <div class="container">
                    <h2>Nossos Produtos</h2>
                    <div class="row row-json">
                      
                    </div>
                </div>
            </section>

            <style>
                @media screen and (max-width:700px){
                    .form--horizontal{
                        margin-left:5px;
                        overflow-x:hidden;
                    }
                }
            </style>
        

            <script>
                const xhttp = new XMLHttpRequest;

                xhttp.onreadystatechange = function() {
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        const jsonProducts = JSON.parse(xhttp.response)
                        jsonProducts.map(($products, $indexP) => {
                            const divColMd4 = document.createElement('div')
                            const divFeatureFeatureSmall = document.createElement('div')
                            const divFeatureBody = document.createElement('div')
                            const divDescriptionProduct = document.createElement('div')
                            const imgElement = document.createElement('img')
                            const h5Element = document.createElement('h5')
                            const pElement = document.createElement('p')
                            const linkProduct = document.createElement('a')
                            const spanElement = document.createElement('span')
                            const strongTagProduct = document.createElement('strong')
                            const pTagPriceProduct = document.createElement('p')
                            const spanElementSearch = document.createElement('span')

                            const rowJson = document.querySelector('.row-json')
                            rowJson.appendChild(divColMd4)
                            divColMd4.append(divFeatureFeatureSmall)
                            divFeatureFeatureSmall.append(imgElement)
                            divFeatureFeatureSmall.append(divFeatureBody)
                            divFeatureBody.append(h5Element)
                            divFeatureBody.append(divDescriptionProduct)
                            divDescriptionProduct.append(pElement)
                            divFeatureBody.append(strongTagProduct)
                            divFeatureBody.append(linkProduct)
                            divFeatureBody.append(spanElement)
                            strongTagProduct.append(pTagPriceProduct)
                            h5Element.append(spanElementSearch)
                            

                            divColMd4.classList.add('col-md-4')
                            divFeatureFeatureSmall.classList.add('feature')
                            divFeatureFeatureSmall.classList.add('feature-1')
                            divFeatureBody.classList.add('feature__body')
                            divFeatureBody.classList.add('boxed')
                            divFeatureBody.classList.add('boxed--border')
                            divDescriptionProduct.classList.add('description--product')
                            spanElement.classList.add('label')
                            spanElement.style.zIndex = '0'
                            
                            spanElement.innerHTML = $products.novo_produto
                            spanElementSearch.innerHTML = $products.titulo_produto
                            pElement.innerHTML = $products.descricao_produto

                            linkProduct.innerHTML = 'Saiba mais'
                            linkProduct.style.textDecoration = 'none'
                            divColMd4.addEventListener('click', () => {
                                window.location.href = `produto.php?id=${$products.id}`
                            })
                            divColMd4.style.cursor = 'pointer'
                            // linkProduct.setAttribute('href', `produto.php?id=${$products.id}`)

                            pTagPriceProduct.innerHTML = $products.preco_produto



                            if(!$products.novo_produto){
                                spanElement.style.display = 'none'
                            }

                            if($products.img_produto == ''){
                                imgElement.src = 'arquivoproduto/default-image.png'
                            }else{
                                imgElement.src = `arquivoproduto/${$products.img_produto}`
                            }

                            if($products.status_produto == 0){
                                divColMd4.style.display = 'none'
                            }
                            
                            

                            const inpSearch = document.getElementById('buscar')
                            h5Element.setAttribute('class', 'titulo_produto')
                            spanElementSearch.setAttribute('class', 'span_titulo_search')

                            inpSearch.addEventListener('input', ($item) => {

                            // Declare variables
                            let filter, section, colSearch, span, i, txtValue;
                                filter = $item.target.value.toLowerCase()
                                section = document.getElementById("json-search");
                                colSearch = section.getElementsByClassName('col-md-4');

                                // Loop through all list items, and hide those who don't match the search query
                                for (i = 0; i < colSearch.length; i++) {
                                    span = colSearch[i].getElementsByClassName("span_titulo_search")[0];
                                    txtValue = span.textContent || span.innerText;
                                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                        colSearch[i].style.display = "";
                                    } else {
                                        colSearch[i].style.display = "none";
                                    }
                                }
                            })

                        const inpChange = document.querySelector('#select_lancamento')
                        const optionTodosOsProdutos = document.querySelector('.todos_produtos')
                        const lancamento = document.querySelector('.lancamento')

                        inpChange.addEventListener('change', ($select) => {

                            if($select.target.value == "2"){

                                document.querySelectorAll(".label").forEach(($label) => {

                                    if($label.style.display == "none"){

                                        $label.classList.add("remove")

                                        document.querySelectorAll(".remove").forEach(($item) => {
                                            $item.parentNode.parentNode.parentNode.style.display = 'none'
                                        })
                                    
                                    }
                                })
                            }else if($select.target.value == "1"){
                                document.querySelectorAll(".remove").forEach(($item) => {
                                    $item.parentNode.parentNode.parentNode.style.display = 'block'
                                })
                            }

                        })
                    })
                }
            }
            
            xhttp.open("GET", "http://localhost/projetos/e-commerce/class/json_new_product.class.php")
            xhttp.send()
            </script>

            

            <style>
                .description--product{
                    height:86px;
                    overflow-y:hidden;
                }
                .vitrine-vazia{
                    padding-bottom:0;
                    padding-top:0;
                }
                .description--product p{
                    text-align:justify;
                }
                .json-search{
                    padding-top:0;
                    padding-bottom:0;
                }
            </style>

              

            <style>
                .section-miniaturas{
                  padding-top:60px;
                  padding-bottom:0;
                }
                .card__top{
                    border:1px solid #ececec;
                    border-bottom:none;
                }
                .card-2{
                    -webkit-box-shadow: -1px 5px 15px -9px #000000; 
                    box-shadow: -1px 5px 15px -9px #000000;
                    border-radius:5px;
                }
            </style>
                
                
                

            



            <section style="padding-top:0;" class="switchable switchable--switch">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-lg-5">
                            <div class="switchable__text">
                                <h2>Entre em contato com a nossa equipe<br class="hidden-xs hidden-sm"> estamos a sua disposição</h2>
                                <p class="lead"> Nossa equipe estará sempre disposta a atendelo referente aos nossos produtos e dúvidas em geral. </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg--secondary boxed boxed--border boxed--lg">
                                <form method="POST" action="PHPMailer/enviar_email.php" action="//mrare.us8.list-manage.com/subscribe/post?u=77142ece814d3cff52058a51f&amp;id=f300c9cce8" data-success="Obrigado por entrar em contato conosco, logo a nossa equipe irá retornar o contato" data-error="Por favor, preencha todos os campos em branco">
                                    <input class="validate-required" type="text" name="nome" placeholder="Seu nome"> 
                                    <input class="validate-required validate-email" type="email" name="email" placeholder="E-mail" required>
                                    <input data-js="telefone" class="validate-required validate-email" type="text" name="telefone" placeholder="Telefone" required>
                                    <input data-js="celular" class="validate-required validate-email" type="text" name="celular" placeholder="Celular" required>
                                    <input type="hidden" name="fTxtNomeH">
                                    <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea> 
                                    <button type="submit" class="btn btn--primary type--uppercase btn-enviar">Enviar</button>
                                    <div style="position: absolute; left: -5000px" aria-hidden="true"> <input type="text" name="b_77142ece814d3cff52058a51f_f300c9cce8" tabindex="-1"> </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
    <script src="js/retina-1.1.0.min.js"></script>

    <!-- THEMEPUNCH SLIDER-->

    <script src="js/jquery.themepunch.tools.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/owl.carousel.min.js"></script>




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