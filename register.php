<?php require_once "class/user.class.php"; ?>
<?php 
$user = new User;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = addslashes($_POST["nome"]);
        $email = addslashes($_POST["email"]);
        $senha = md5(addslashes($_POST["password"]));

        $user->cadastrar($nome, $email, $senha);

        return true;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link rel="shortcut icon" href="img/logo/logo-1.png" type="image/x-icon">
<title>Loja de Roupas Meraki</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
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

<div id="main-wrapper" class="oxyy-login-register h-100 d-flex flex-column bg-transparent">
  <div class="container my-auto">
    <div class="row no-gutters h-100">
      <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
        <div class="logo text-center mb-2"> <a href="index.html" title="Oxyy"><img src="img/logo/logo-meraki-admin.png" alt="meraki"></a> </div>
        <p class="lead text-center mb-3">Parece que você é novo por aqui!</p>
        <form id="registerForm" method="POST" action="#">
          <div class="vertical-input-group">
            <div class="input-group">
              <input nome name="nome" type="text" class="form-control" id="fullName" required placeholder="Nome Completo">
            </div>
            <div class="input-group">
              <input name="email" type="email" class="form-control lowercase" id="emailAddress" required placeholder="Email">
            </div>
            <div class="input-group">
              <input name="password" type="password" class="form-control lowercase" id="loginPassword" required placeholder="Senha">
            </div>
          </div>
          <button class="btn btn-primary btn-block shadow-none my-4" type="submit">Criar Conta</button>
        </form>
        <p class="text-center text-muted mb-3">Já Possui uma conta? <a class="btn-link" href="login.php">Log In</a></p>
        <!-- <p class="text-center text-muted text-1 mb-0">By creating an account, you agree to Oxyy <a class="btn-link" href="#">Terms of use</a> and <a class="btn-link" href="#">Privacy Policy</a></p> -->
      </div>
    </div>
  </div>
  <div class="container-fluid bg-white py-2">
    <p class="text-center text-2 text-muted mb-0">Copyright © 2020 <a href="#" class="vmb-direitos-autorais">Meraki</a>. Todos os Direitos Reservados.</p>
  </div>
</div>

<!-- Styles Switcher -->
<div id="styles-switcher" class="left">
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
</div>
<!-- Styles Switcher End -->

<script>
    document.querySelector('.blue').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#007bff"
        document.querySelector('button').style.border = "1px solid #007bff"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#007bff", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#007bff", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#007bff", "important");
    })
    document.querySelector('.indigo').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#6610f2"
        document.querySelector('button').style.border = "1px solid #6610f2"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#6610f2", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#6610f2", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#6610f2", "important");
    })
    document.querySelector('.purple').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#6f42c1"
        document.querySelector('button').style.border = "1px solid #6f42c1"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#6f42c1", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#6f42c1", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#6f42c1", "important");
    })
    document.querySelector('.pink').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#e83e8c"
        document.querySelector('button').style.border = "1px solid #e83e8c"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#e83e8c", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#e83e8c", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#e83e8c", "important");
    })
    document.querySelector('.red').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#dc3545"
        document.querySelector('button').style.border = "1px solid #dc3545"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#dc3545", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#dc3545", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#dc3545", "important");
    })
    document.querySelector('.orange').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#fd7e14"
        document.querySelector('button').style.border = "1px solid #fd7e14"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#fd7e14", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#fd7e14", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#fd7e14", "important");
    })
    document.querySelector('.yellow').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#ffc107"
        document.querySelector('button').style.border = "1px solid #ffc107"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#ffc107", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#ffc107", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#ffc107", "important");
    })
    document.querySelector('.teal').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#20c997"
        document.querySelector('button').style.border = "1px solid #20c997"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#20c997", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#20c997", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#20c997", "important");
    })
    document.querySelector('.green').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#28a745"
        document.querySelector('button').style.border = "1px solid #28a745"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#28a745", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#28a745", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#28a745", "important");
    })
    document.querySelector('.cyan').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#17a2b8"
        document.querySelector('button').style.border = "1px solid #17a2b8"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#17a2b8", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#17a2b8", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#17a2b8", "important");
    })
    document.querySelector('.brown').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#795548"
        document.querySelector('button').style.border = "1px solid #795548"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#795548", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#795548", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#795548", "important");
    })
    document.querySelector('.logo-swtach').addEventListener('click', () => {
        document.querySelector('button').style.backgroundColor = "#3f5c80"
        document.querySelector('button').style.border = "1px solid #3f5c80"

        document.querySelector('.oxyy-login-register .text-primary, .oxyy-login-register .btn-link').style.setProperty("color", "#3f5c80", "important");
        document.querySelector('.esqueceu-a-senha').style.setProperty("color", "#3f5c80", "important");
        document.querySelector('.vmb-direitos-autorais').style.setProperty("color", "#3f5c80", "important");
    })
</script>

<!-- Tratamento CapsLock -->
<script>
    document.querySelectorAll("input").forEach(($input) => {
        $input.addEventListener('input', (e) => {
            const valueOfInput = e.target.value.toLowerCase()
            document.querySelectorAll('.lowercase').forEach(($lowerCaseInput) => {
                $lowerCaseInput.addEventListener('keyup', (e) => {
                    e.target.value = valueOfInput
                })
            })
        })
    })
</script>
<!-- Tratamento CapsLock -->

<!-- Script --> 
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="assets/js/switcher.min.js"></script> 
<script src="assets/js/theme.js"></script>
</body>
</html>