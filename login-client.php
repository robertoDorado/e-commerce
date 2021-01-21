<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="shortcut icon" href="img/logo/logo-1.png" type="image/x-icon">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>Seja Bem Vindo!</title>
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
      <!-- Login Form
      ========================= -->
      <div class="col-md-6 d-flex flex-column order-2 order-md-1">
        <div class="container my-auto py-5">
          <div class="row">
            <div class="col-11 col-lg-9 col-xl-8 mx-auto text-center">
              <div class="logo mb-4"> <a href="index.php" title="Oxyy"><img src="img/logo/logo-meraki-admin.png" alt="Meraki"></a> </div>
              <form action="index.php" id="loginForm" method="post">
                <div class="vertical-input-group">
                  <div class="input-group">
                    <input name="email" type="email" class="form-control" id="emailAddress" required placeholder="Email">
                  </div>
                  <div class="input-group">
                    <input name="password" type="password" class="form-control" id="loginPassword" required placeholder="Senha">
                  </div>
                </div>
                <button class="btn btn-primary btn-block shadow-none my-4" type="submit">Login</button>
              </form>
              <?php if(isset($_GET['erro'])):?>
                  <div style="display:block;" class="error-message"><p class="lead text-center select-message-error">Email ou senha incorreto</p></div>
              <?php endif; ?>
              <!-- <a class="btn-link text-2" href="forgot-Password-3.html">Esqueci a minha senha!</a> -->
              <div class="d-flex align-items-center my-2">
                <hr class="flex-grow-1">
                <span class="mx-2 text-2 text-muted">OU</span>
                <hr class="flex-grow-1">
              </div>
              <!-- <div class="d-flex  flex-column align-items-center mb-4">
                <ul class="social-icons social-icons-rounded">
                  <li class="social-icons-facebook"><a href="#" data-toggle="tooltip" data-original-title="Log In with Facebook"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="social-icons-instagram"><a href="#" data-toggle="tooltip" data-original-title="Log In with Instagram"><i class="fab fa-instagram"></i></a></li>
                  <li class="social-icons-google"><a href="#" data-toggle="tooltip" data-original-title="Log In with Google"><i class="fab fa-google"></i></a></li>
                  <li class="social-icons-linkedin"><a href="#" data-toggle="tooltip" data-original-title="Log In with Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
              </div> -->
              <p class="text-muted text-2">Ainda não possui uma conta?</p>
              <a class="btn btn-sm btn-outline-primary rounded-pill shadow-none" href="criar-conta-cliente.php">Criar uma conta agora!</a> </div>
          </div>
        </div>
        <div class="container py-2">
          <p class="text-2 text-muted text-center mb-0">Copyright © 2021 <a href="#">Meraki</a>. Todos os direitos Reservados.</p>
        </div>
      </div>
      <!-- Login Form End --> 
      
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6 order-1 order-md-2">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-secondary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('img/login-cliente.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="row no-gutters my-auto py-5">
              <div class="col-10 col-lg-9 mx-auto">
                <p class="text-4 text-white">Estamos felizes em recebe-lo novamente.</p>
                <h1 class="text-10 text-white mb-4">Junte-se ao nosso espaço reservado para os nossos clientes!</h1>
                <a class="btn btn-outline-light shadow-none video-btn mt-2" href="#" data-src="https://www.youtube.com/embed/rJd6Qd3ZoOY" data-toggle="modal" data-target="#videoModal"><span class="mr-2"><i class="fas fa-play-circle"></i></span>Meraki</a> </div>
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



<!-- Script --> 
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="assets/js/switcher.min.js"></script> 
<script src="assets/js/theme.js"></script>
</body>
</html>

<style>
  .error-message{
    background-color:rgb(218, 44, 56);
    display:none;
  }
  .error-message p{
    color:#fff;
  }
</style>

<script>
  window.history.replaceState({}, "Hide", "http://localhost/projetos/e-commerce/login-client.php")
</script>