<?php
require_once "class/register_product.class.php";
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

    <nav id="menu1" class="bar menu-principal bar-1 hidden-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1 col-md-2 hidden-xs">
                                <div class="bar__module">
                                    <a href="index.html"> <img  class="logo logo-dark" alt="logo" src="img/logo/logo-1.png"> <img  class="logo logo-light" alt="logo" src="img/logo/logo-1.png"> </a>
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
                                <div class="bar__module">
                                    <a class="btn btn--sm btn--primary type--uppercase" href="#purchase-template"> <span class="btn__text">
                                    Contato
                                </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
            
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
<section class="space--lg">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-7 col-lg-6">
                            <div class="slider border--round boxed--border" data-paging="true" data-arrows="true">
                                <ul class="slides">
                                    <li> <img alt="Image" src="img/product-single-2.jpg"> </li>
                                    <li> <img alt="Image" src="img/product-single-1.jpg"> </li>
                                    <li> <img alt="Image" src="img/product-single-3.jpg"> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4">
                            <h2>Tivoli Model One</h2>
                            <div class="text-block"> <span class="h4 type--strikethrough inline-block">$549.99</span> <span class="h4 inline-block">$479</span> </div>
                            <p> Tivoli's most popular line of consumer digital radios just got a refresh — expect clearer highs and deeper lows. Massive style upgrade with high-calibre aluminum frame and plush knobs and dials. </p>
                            <ul class="accordion accordion-2 accordion--oneopen">
                                <li>
                                    <div class="accordion__title"> <span class="h5">Specifications</span> </div>
                                    <div class="accordion__content">
                                        <ul class="bullets">
                                            <li><span>Frequence Response: 25KHz — 24,000KHz</span></li>
                                            <li><span>DAB+ / FM / AM</span></li>
                                            <li><span>16,000 mAh Internal Rehcargable Battery</span></li>
                                            <li><span>10 Watts</span></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="active">
                                    <div class="accordion__title"> <span class="h5">Dimensions</span> </div>
                                    <div class="accordion__content">
                                        <ul>
                                            <li><span>Product: 3.5”W X 3.0”H X 3.0”D</span></li>
                                            <li><span>Packaging: 7”W X 6”H X 5”D </span></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="accordion__title"> <span class="h5">Shipping Info</span> </div>
                                    <div class="accordion__content">
                                        <p> Generally ships between 2 - 4 working days from order confirmation. Orders only confirmed once payment has successfully processed. NOTE: When using services such as Skrill, payments can take longer to process (approx. 4 days). </p>
                                    </div>
                                </li>
                            </ul>
                            <form>
                                <div class="col-md-12">
                                    <div class="input-select"> <select name="finish">
								<option selected="selected" value="Default">Select A Finish</option>
								<option value="Small">Wood Grain</option>
								<option value="Medium">Brushed Aluminium</option>
								<option value="Larger">Gunmetal Grey</option>
							</select> </div>
                                </div>
                                <div class="col-md-6 col-lg-4"> <input type="text" name="quantity" placeholder="QTY"> </div>
                                <div class="col-md-6 col-lg-8"> <button type="submit" class="btn btn--primary">Add To Cart</button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        

            

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

</body>


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