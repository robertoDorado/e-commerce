<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="shortcut icon" href="img/logo/logo-1.png" type="image/x-icon">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>Cadastro do Cliente</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
</head>
<body>

<!-- Preloader -->
<div class="preloader">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row no-gutters min-vh-100"> 
      <!-- Register Form
      ========================= -->
      <div class="col-md-6 d-flex flex-column order-2 order-md-1">
        <div class="container my-auto py-5">
          <div class="row">
            <div class="col-11 col-lg-9 col-xl-8 mx-auto text-center">
              <div class="logo mb-4"> <a href="index.html" title="Oxyy"><img src="img/logo/logo-meraki-admin.png" alt="Meraki"></a> </div>
              <form action="cadastro-realizado-cliente.php" id="registerForm" method="post">
                <div class="vertical-input-group">
                  <div class="input-group">
                    <input name="nome" type="text" class="form-control" id="fullName" required placeholder="Nome e Sobrenome">
                  </div>
                  <div class="input-group">
                    <input name="email" type="email" class="form-control" id="emailAddress" required placeholder="Email">
                  </div>
                  <div class="input-group">
                    <input name="password" type="password" class="form-control" id="loginPassword" required placeholder="Senha">
                  </div>
                </div>
                <!-- <div class="form-group mt-3">
                  <div class="form-check text-2 custom-control custom-checkbox">
                    <input id="agree" name="agree" class="custom-control-input" type="checkbox">
                    <label class="custom-control-label text-muted" for="agree">I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</label>
                  </div>
                </div> -->
                <button class="btn btn-primary btn-block shadow-none my-3" type="submit">Criar Conta</button>
              </form>
              <div class="d-flex align-items-center my-3">
                <hr class="flex-grow-1">
                <span class="mx-2 text-2 text-muted">OU</span>
                <hr class="flex-grow-1">
              </div>
              <!-- <div class="d-flex  flex-column align-items-center mb-4">
                <ul class="social-icons social-icons-rounded">
                  <li class="social-icons-facebook"><a href="#" data-toggle="tooltip" data-original-title="Log In with Facebook"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="social-icons-twitter"><a href="#" data-toggle="tooltip" data-original-title="Log In with Twitter"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-icons-google"><a href="#" data-toggle="tooltip" data-original-title="Log In with Google"><i class="fab fa-google"></i></a></li>
                  <li class="social-icons-linkedin"><a href="#" data-toggle="tooltip" data-original-title="Log In with Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
              </div> -->
              <p class="text-muted text-2">Já possui uma conta? <a class="btn-link" href="login-client.php">Faça login agora!</a></p>
            </div>
          </div>
        </div>
        <div class="container py-2">
          <p class="text-2 text-muted text-center mb-0">Copyright © 2021 <a href="#">Meraki</a>. Todos os direitos reservados.</p>
        </div>
      </div>
      <!-- Register Form End --> 
      
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6 order-1 order-md-2">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-secondary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('img/criar-conta-cliente.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="row no-gutters my-auto py-5">
              <div class="col-10 col-lg-9 mx-auto">
                <p class="text-4 text-white">Cadastre-se preenchendo o formulário com as suas informações.</p>
                <h1 class="text-10 text-white mb-4">Parece que você é novo por aqui!</h1>
                <!-- <a class="btn btn-outline-light shadow-none video-btn mt-2" href="#" data-src="https://www.youtube.com/embed/7e90gBu4pas" data-toggle="modal" data-target="#videoModal"><span class="mr-2"><i class="fas fa-play-circle"></i></span>Watch demo</a> </div> -->
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
    </div>
  </div>
</div>

<!-- Video Modal
========================= -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content bg-transparent border-0">
      <button type="button" class="close text-white opacity-10 ml-auto mr-n3 font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body p-0">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" id="video" allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Video Modal end --> 

<!-- Styles Switcher -->
<!-- <div id="styles-switcher" class="right">
  <h5>Color Switcher</h5>
  <hr>
  <ul class="mb-0">
    <li class="blue" data-toggle="tooltip" title="Blue" data-path="#"></li>
    <li class="indigo" data-toggle="tooltip" title="Indigo" data-path="css/color-indigo.css"></li>
    <li class="purple" data-toggle="tooltip" title="Purple" data-path="css/color-purple.css"></li>
    <li class="pink" data-toggle="tooltip" title="Pink" data-path="css/color-pink.css"></li>
    <li class="red" data-toggle="tooltip" title="Red" data-path="css/color-red.css"></li>
    <li class="orange" data-toggle="tooltip" title="Orange" data-path="css/color-orange.css"></li>
    <li class="yellow" data-toggle="tooltip" title="Yellow" data-path="css/color-yellow.css"></li>
    <li class="teal" data-toggle="tooltip" title="Teal" data-path="css/color-teal.css"></li>
    <li class="green" data-toggle="tooltip" title="Green" data-path="css/color-green.css"></li>
    <li class="cyan" data-toggle="tooltip" title="Cyan" data-path="css/color-cyan.css"></li>
    <li class="brown" data-toggle="tooltip" title="Brown" data-path="css/color-brown.css"></li>
  </ul>
  <button class="btn switcher-toggle"><i class="fas fa-cog"></i></button>
</div> -->
<!-- Styles Switcher End --> 

<!-- Script --> 
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="assets/js/switcher.min.js"></script> 
<script src="assets/js/theme.js"></script>
</body>
</html>