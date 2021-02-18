<?php
require_once "class/carrinho.class.php";
require_once "vendor/autoload.php";
require_once "class/config_pag_seguro.php";
require_once "class/user.class.php";
require_once "class/info_pagseguro.class.php";
$user = new User;
$cart = new Cart;
$pagamentos = new Pagamentos;

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

if(isset($_POST['pagamentos'], $_POST['total-a-pagar'])){

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
        <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
        <script>PagSeguroDirectPayment.setSessionId("<?php echo $dados['sessionCode']; ?>")</script>

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

        <div class="container select--container-form">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <?php if(isset($_SESSION['user_client'])):?>
                        <?php foreach($data as $newData): ?>
                        <h3>Preencha os dados de Pagamento</h3>
                        <div class="form-group">
                            <label for="nome">Nome Completo:</label><br>
                            <input value="<?php echo $newData['nome']?>" style="width:300px;" class="form-control" type="text" name="nome" id="nome">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input style="width:300px;" type="email" name="email" id="email" value="c34149393016125191405@sandbox.pagseguro.com.br">
                        </div>

                        <div class="form-group">
                            <label for="Cpf">CPF:</label><br>
                            <input style="width:300px;" type="text" name="cpf" id="cpf" data-js="cpf">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha:</label><br>
                            <input style="width:300px;" type="password" name="password" id="password" value="<?php echo $newData['senha'];?>">
                        </div>

                        <div class="form-group">
                            <label for="celular">Celular:</label><br>
                            <input data-js="celular" style="width:300px;" type="text" name="celular" id="celular">
                        </div>

                        <br>

                        <h3>Informações de Endereço:</h3>
                        <div class="form-group">
                            <label for="cep">CEP:</label><br>
                            <input data-js="cep" style="width:300px;" type="text" name="cep" id="cep">
                        </div>

                        <div class="form-group">
                            <label for="rua">Rua:</label><br>
                            <input style="width:300px;" type="text" name="rua" id="rua">
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro:</label><br>
                            <input style="width:300px;" type="text" name="bairro" id="bairro">
                        </div>

                        <div class="form-group">
                            <label for="numero">Número:</label><br>
                            <input data-js="number" style="width:300px;" type="text" name="numero" id="numero">
                        </div>

                        <div class="form-group">
                            <label for="complemento">Complemento:</label><br>
                            <input style="width:300px;" type="text" name="complemento" id="complemento">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade:</label><br>
                            <input style="width:300px;" type="text" name="cidade" id="cidade">
                        </div>


                        <div class="form-group">
                            <label for="estado">Estado:</label><br>
                            <select name="estado" id="estado" style="width:300px;">
                                <option value="0" selected disabled>Selecione o Estado</option>
                                <option value="RO">Rondônia</option>
                                <option value="AC">Acre</option>
                                <option value="AM">Amazonas</option>
                                <option value="RR">Roraima</option>
                                <option value="PA">Pará</option>
                                <option value="AP">Amapá</option>
                                <option value="TO">Tocantins</option>
                                <option value="MA">Maranhão</option>
                                <option value="PI">Piauí</option>
                                <option value="CE">Ceará</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="PB">Paraíba</option>
                                <option value="PE">Pernambuco</option>
                                <option value="AL">Alagoas</option>
                                <option value="SE">Sergipe</option>
                                <option value="BA">Bahia</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="SP">São Paulo</option>
                                <option value="PR">Paraná</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="GO">Goias</option>
                                <option value="DF">Distrito Federal</option>
                            </select>
                        </div>

                        <button id="btn-cep" style="border:none;padding-left:20px;padding-right:20px;" class="btn btn-primary">Buscar Endereço</button><br><br>

                        <h3>Informações de Pagamento:</h3>
                        <div class="form-group">
                            <label for="cartao-nome">Nome do titular do Cartão:</label><br>
                            <input style="width:300px;" type="text" name="cartao-nome" id="cartao-nome">
                        </div>

                        <div class="form-group">
                            <label for="card-birth">Nascimento do titular do Cartão:</label><br>
                            <input data-js="nascimento" style="width:300px;" type="text" name="card-birth" id="card-birth">
                        </div>

                        <div class="form-group">
                            <label for="cartao-numero">Número do Cartão:</label><br>
                            <input style="width:300px;" type="text" name="cartao-numero" id="cartao-numero" value="4111111111111111">
                        </div>

                        <div class="form-group">
                            <label for="codigo">Código de seguraça: <small>(Fica no verso do cartão)</small></label><br>
                            <input data-js="cvv" style="width:300px;" type="text" name="codigo" id="codigo">
                        </div>

                        <div class="form-group">
                            <label for="mes">Mês:</label><br>
                            <select style="width:300px" name="mes" id="mes"></select>
                        </div>

                        <div class="form-group">
                            <label for="ano">Ano:</label><br>
                            <select style="width:300px" name="ano" id="ano"></select>
                        </div>

                        <div class="form-group">
                            <label for="parcela">Selecione uma Parcela:</label><br>
                            <select style="width:300px" name="parcela" id="parcela"></select>
                            <input type="hidden" id="valor_frete" name="valor_frete" value="<?php echo (isset($_POST['valor_frete'])) ? $_POST['valor_frete'] : ''; ?>">
                        </div>

                        <button style="150px;border:none;padding-left:20px;padding-right:20px;" id="get-btn-submit" class="btn btn-success">Efetuar Compra</button><br><br>
                        <div style="display:none;width:300px" class="select-error-message error-message"><p class="lead text-center select-message-error">Cartão Inválido</p></div>
                        <div style="display:none;width:300px" class="select-wait-message wait-message"><p class="lead text-center select-message-error">Aguarde um Instante</p></div>
                        <div style="display:none;width:300px" class="select-field-message field-message"><p class="lead text-center select-message-error">Preencha todos os campos</p></div>
                        <br>
                    <?php endforeach; ?>
                    <?php endif;?>
                </div>
            </div>
        </div>                


        <style>
        .error-message{
            background-color:rgb(218, 44, 56);
        }
        .error-message p{
            color:#fff;
        }
        .wait-message{
            background:#4a90e2;
        }
        .wait-message p{
            color:#fff;
        }
        .field-message{
            background:#fff3cd;
        }
        .field-message p{
            color:#a18533;
        }
        .select--container-form{
            margin-top:150px;
        }
        @media screen and (max-width:700px){
            .select--container-form{
                margin-top:0;
            }
        }
        </style>

        <script>
            document.getElementById('mes').addEventListener('change', (e) => {
                window.mesCartao = e.target.children[e.target.selectedIndex]
                return window.mesCartao.value
            })

            document.getElementById('ano').addEventListener('change', (e) => {
                window.anoCartao = e.target.children[e.target.selectedIndex]
                return window.anoCartao.value
            })
        </script>
        
        <script>
            let selectParcela = document.querySelector('#parcela')
            selectParcela.innerHTML = '<option value="0" selected disabled>Selecione as parcelas</option>'
            document.getElementById('cartao-numero').addEventListener('input', ($input) => {
                if($input.target.value.length == 6){
                    
                    PagSeguroDirectPayment.getBrand({
                        cardBin: $input.target.value,
                        success: function(result){
                            window.bandeira = result.brand.name

                            PagSeguroDirectPayment.getInstallments({
                            amount: <?php echo $_POST['total-a-pagar'];?>,
                            brand: window.bandeira,
                            success: function(result){

                                document.querySelector('.select-error-message').style.display = 'none'


                                const parcelasVisa = result.installments.visa
                                const parcelasMastercard = result.installments.mastercard
                                const parcelasElo = result.installments.elo

                                if(parcelasVisa){

                                    parcelasVisa.forEach(($parcelas, $index) => {

                                        let valorDaParcela = $parcelas.installmentAmount.toLocaleString('pt-br', {minimumFractionDigits: 2});

                                        let valorTotal = $parcelas.totalAmount.toLocaleString('pt-br', {minimumFractionDigits: 2});

                                        const option = document.createElement('option')
                                        option.setAttribute('value', `${$parcelas.quantity} x R$${valorDaParcela}`)
                                        option.innerHTML = `${$parcelas.quantity} x R$${valorDaParcela} total R$${valorTotal}`
                                        selectParcela.append(option)
                                        
                                    })

                                }

                                if(parcelasMastercard){

                                    parcelasMastercard.forEach(($parcelas, $index) => {

                                    let valorDaParcela = $parcelas.installmentAmount.toLocaleString('pt-br', {minimumFractionDigits: 2});

                                    let valorTotal = $parcelas.totalAmount.toLocaleString('pt-br', {minimumFractionDigits: 2});

                                    const option = document.createElement('option')
                                    option.setAttribute('value', `${$parcelas.quantity} x R$${valorDaParcela}`)
                                    option.innerHTML = `${$parcelas.quantity} x R$${valorDaParcela} total R$${valorTotal}`
                                    selectParcela.append(option)

                                    })

                                }

                                if(parcelasElo){

                                    parcelasElo.forEach(($parcelas, $index) => {

                                    let valorDaParcela = $parcelas.installmentAmount.toLocaleString('pt-br', {minimumFractionDigits: 2});

                                    let valorTotal = $parcelas.totalAmount.toLocaleString('pt-br', {minimumFractionDigits: 2});

                                    const option = document.createElement('option')
                                    option.setAttribute('value', `${$parcelas.quantity} x R$${valorDaParcela}`)
                                    option.innerHTML = `${$parcelas.quantity} x R$${valorDaParcela} total R$${valorTotal}`
                                    selectParcela.append(option)

                                    })

                                }
                                

                            },
                            error: function(result){
                                console.log(result)
                                
                            },
                            complete: function(result){
                                
                            }
                            });

                        },
                        error: function(result) {
                            document.querySelector('.select-error-message').style.display = 'block'
                        },
                        complete: function(result){
                            
                        }

                    })

                }

            })

        const nomeCliente = document.getElementById('nome')
        const emailCliente = document.getElementById('email')
        const senhaCliente = document.getElementById('password')
        const cpfCliente = document.getElementById('cpf')
        const celularCliente = document.getElementById('celular')

        // Informações do endereço

        const cepCliente = document.getElementById('cep')
        const ruaCliente = document.getElementById('rua')
        const bairroCliente = document.getElementById('bairro')
        const numeroCliente = document.getElementById('numero')
        const complementoCliente = document.getElementById('complemento')
        const cidadeCliente = document.getElementById('cidade')
        const estadoCliente = document.getElementById('estado')

        // Informações do Cartão
        const cartaoNome = document.getElementById('cartao-nome')
        const codigoCartao = document.getElementById('codigo')
        const cartaoNumero = document.getElementById('cartao-numero').value
        const frete = document.querySelector('#valor_frete').value
        const birthDate = document.getElementById('card-birth')

        
        document.querySelector('#get-btn-submit').addEventListener('click', (e) => {

            if(nomeCliente.value != '' && emailCliente.value != '' && senhaCliente.value != '' && cpfCliente.value != '' && celularCliente.value != '' && cepCliente.value != '' && ruaCliente.value != '' && cidadeCliente != '' && estadoCliente != '' && cartaoNome != '' && codigoCartao != '' && cartaoNumero != '' && frete != ''){

                    PagSeguroDirectPayment.createCardToken({
                    cardNumber: cartaoNumero,
                    brand: window.bandeira,
                    cvv: codigoCartao.value,
                    expirationMonth: window.mesCartao.value,
                    expirationYear: window.anoCartao.value,
                    success: function(result){

                        const formData = new FormData;
                        const xmlToken = new XMLHttpRequest;
                        const idPagSeguro = PagSeguroDirectPayment.getSenderHash()
                        const selectParcelaCartao = document.querySelector('#parcela').value

                        let idUser = Math.random() * 100 * parseInt(cartaoNumero)
                        idUser = idUser.toString()

                        document.querySelector('.select-wait-message').style.display = 'block'

                        formData.append("id_user", idUser)
                        formData.append("nome_cliente", nomeCliente.value)
                        formData.append("nascimento_cliente", birthDate.value)
                        formData.append("email_cliente", emailCliente.value)
                        formData.append("senha_cliente", senhaCliente.value)
                        formData.append("cpf_cliente", cpfCliente.value)
                        formData.append("celular_cliente", celularCliente.value)
                        formData.append("cep_cliente", cepCliente.value)
                        formData.append("rua_cliente", ruaCliente.value)
                        formData.append("bairro_cliente", bairroCliente.value)
                        formData.append("numero_endereco", numeroCliente.value)
                        formData.append("complemento_cliente", complementoCliente.value)
                        formData.append("cidade_cliente", cidadeCliente.value)
                        formData.append("estado_cliente", estadoCliente.value)
                        formData.append("nome_cartao", cartaoNome.value)
                        formData.append("numero_cartao", cartaoNumero)
                        formData.append("codigo_cartao", codigoCartao.value)
                        formData.append("mes_expiracao",  window.mesCartao.value)
                        formData.append("ano_expiracao", window.anoCartao.value)
                        formData.append("parcela_cartao", selectParcelaCartao)
                        formData.append("valor_frete", frete)
                        formData.append("id_pag_seguro", idPagSeguro)
                        formData.append("token_card", result.card.token)
                        
                        xmlToken.onreadystatechange = () =>{

                            if(xmlToken.readyState == 4 && xmlToken.status == 200){
                                
                                window.location.href = `compra-realizada-com-sucesso.php?idUser=${idUser}&name=${nomeCliente.value}&email=${emailCliente.value}&phone=${celularCliente.value}&address=${ruaCliente.value}&numberAddress=${numeroCliente.value}&district=${bairroCliente.value}&cep=${cepCliente.value}&complemento=${complementoCliente.value}&city=${cidadeCliente.value}&estado=${estadoCliente.value}&parcela=${selectParcelaCartao}`

                            }
                            if(xmlToken.response == "Erro no pagamento"){

                                window.location.href = "erro-no-pagamento.php"
                            }
                        }

                        xmlToken.open("POST", "finalizar-pagamento.php", true)
                        xmlToken.send(formData)
                                
                    },
                    error: function(result){
                        document.querySelector('.select-error-message').style.display = 'block'
                    },
                    complete: function(result){
    
                    }
                });

            }else{
                document.querySelector('.select-field-message').style.display = 'block'
            }

        })
        </script>
        

            <script>
                document.getElementById('btn-cep').addEventListener('click', (e) => {
                    e.preventDefault()
                    const xmlUrlCep = new XMLHttpRequest;
                    const cep = document.getElementById('cep').value

                    xmlUrlCep.onreadystatechange = () => {

                        if(xmlUrlCep.status == 200 && xmlUrlCep.readyState == 4){

                            const objectUrlCep = JSON.parse(xmlUrlCep.response)

                            document.getElementById('rua').value = objectUrlCep.address

                            document.getElementById('bairro').value = objectUrlCep.district

                            document.getElementById('cidade').value = objectUrlCep.city

                            document.getElementById('estado').value = objectUrlCep.state

                            if(objectUrlCep.address == undefined){

                                document.getElementById('rua').value = 'Endereço não encontrado'

                            }else if(objectUrlCep.district == undefined){

                                document.getElementById('bairro').value = 'Bairro não encontrado'

                            }else if(objectUrlCep.city == undefined){

                                document.getElementById('cidade').value = ''

                            }else if(objectUrlCep.state == undefined){

                                document.getElementById('estado').value = ''
                            }

                        }
                    }

                    xmlUrlCep.open("GET", `https://ws.apicep.com/cep/${cep}.json`)
                    xmlUrlCep.send()
                })
            </script>
            
            <script>
                let option = "<option disabled selected value='0'>Selecione o mês do cartão</option>"
                for(let i = 1; i <= 12; i++){
                    if(i < 10){
                        option += `<option value='${i}' id='${i}'>0${i}</option>`
                    }else{
                        option += `<option value='${i}' id='${i}'>${i}</option>`
                    }
                    document.getElementById('mes').innerHTML = option 
                }


                const date = new Date;
                let optionYear = "<option disabled selected value='0'>Selecione o ano do cartão</option>"
                for(let i = date.getFullYear(); i <= date.getFullYear() + 20; i++){
                    optionYear += `<option value='${i}' id='${i}'>${i}</option>`
                    document.getElementById('ano').innerHTML = optionYear
                }
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
                    },
                    cep(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{5})(\d)/, '$1-$2')
                        .replace(/(-\d{3})\d+?$/, '$1')
                    },
                    number(value){
                        return value
                        .replace(/\D/g, '')
                    },
                    cvv(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{3})\d+?$/, '$1')
                    },
                    cpf(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{3})(\d)/, '$1.$2')
                        .replace(/(\d{3})(\d)/, '$1.$2')
                        .replace(/(\d{3})(\d)/, '$1-$2')
                        .replace(/(-\d{2})\d+?$/, '$1')
                    },
                    nascimento(value){
                        return value
                        .replace(/\D/g, '')
                        .replace(/(\d{2})(\d)/, '$1/$2')
                        .replace(/(\d{2})(\d)/, '$1/$2')
                        .replace(/(\d{4})\d+?$/, '$1')
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
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


    <!-- <script src="js/jquery-3.1.1.min.js"></script> -->
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
