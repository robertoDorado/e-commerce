<?php
session_start();
require_once "vendor/autoload.php";
require_once "class/config_pag_seguro.php";
require_once "class/info_pagseguro.class.php";
require_once "class/carrinho.class.php";
$pagamentos = new Pagamentos;
$carrinho = new Cart;

if(isset($_POST['token_card'])){

    $idUser = addslashes($_POST['id_user']);
    $idProduto = addslashes($_POST['id_produto']);
    $nomeCliente = utf8_decode(addslashes($_POST['nome_cliente']));
    $emailCliente = addslashes($_POST['email_cliente']);
    $cpfCliente = addslashes($_POST['cpf_cliente']);
    $senhaCliente = addslashes($_POST['senha_cliente']);
    $telefoneCliente = addslashes($_POST['celular_cliente']);
    $cepCliente = addslashes($_POST['cep_cliente']);
    $ruaCliente = utf8_decode(addslashes($_POST['rua_cliente']));
    $bairroCliente = utf8_decode(addslashes($_POST['bairro_cliente']));
    $numeroEndereco = addslashes($_POST['numero_endereco']);
    $complementoEndereco = utf8_decode(addslashes($_POST['complemento_cliente']));
    $cidadeCliente = utf8_decode(addslashes($_POST['cidade_cliente']));
    $estadoCliente = addslashes($_POST['estado_cliente']);
    $nomeCartao = utf8_decode(addslashes($_POST['nome_cartao']));
    $numeroCartao = addslashes($_POST['numero_cartao']);
    $mesExpiracao = addslashes($_POST['mes_expiracao']);
    $anoExpiracao = addslashes($_POST['ano_expiracao']);
    $codigoCartao = addslashes($_POST['codigo_cartao']);
    $parcelaCartao = addslashes($_POST['parcela_cartao']);
    $idPagSeguro = addslashes($_POST['id_pag_seguro']);
    $tokenCard = addslashes($_POST['token_card']);

    $pagamentos->checkoutCreditCard($idUser, $idProduto, $nomeCliente, $emailCliente, $cpfCliente, $senhaCliente, $telefoneCliente, $cepCliente, $ruaCliente, $bairroCliente, $numeroEndereco, $complementoEndereco, $cidadeCliente, $estadoCliente, $nomeCartao, $numeroCartao, $mesExpiracao, $anoExpiracao, $codigoCartao, $parcelaCartao, $idPagSeguro, $tokenCard);
    
}
$data = $pagamentos->selectInfoCostumer();
if(isset($data)){
    
    foreach($data as $newData)
    $currentUser = $pagamentos->selectAsIdUserCostumer($newData['id_user']);
    $items = $carrinho->getList();
    print_r($items);
    print_r($currentUser);
}
exit;


//Instantiate a new direct payment request, using Credit Card
$creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

/**
 * @todo Change the receiver Email
 */
$creditCard->setReceiverEmail('robertodorado7@gmail.com');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.
$creditCard->setReference($currentUser['id_user']);

// Set the currency
$creditCard->setCurrency("BRL");

// Add an item for this payment request
$creditCard->addItems()->withParameters(
    '0001',
    'Notebook prata',
    2,
    10.00
);

// Add an item for this payment request
// $creditCard->addItems()->withParameters(
//     '0002',
//     'Notebook preto',
//     2,
//     5.00
// );

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
$creditCard->setSender()->setName('João da Silva');
$creditCard->setSender()->setEmail('c34149393016125191405@sandbox.pagseguro.com.br');

$creditCard->setSender()->setPhone()->withParameters(
    11,
    '955555555'
);

$creditCard->setSender()->setDocument()->withParameters(
    'CPF',
    44257318830
);


$creditCard->setSender()->setHash($idPagSeguro);

$creditCard->setSender()->setIp('127.0.0.1');

// Set shipping information for this payment request
$creditCard->setShipping()->setAddress()->withParameters(
    'Av. Brig. Faria Lima',
    '1384',
    'Jardim Paulistano',
    '01452002',
    'São Paulo',
    'SP',
    'BRA',
    'apto. 114'
);

//Set billing information for credit card
$creditCard->setBilling()->setAddress()->withParameters(
    'Av. Brig. Faria Lima',
    '1384',
    'Jardim Paulistano',
    '01452002',
    'São Paulo',
    'SP',
    'BRA',
    'apto. 114'
);

// Set credit card token
$creditCard->setToken($tokenCard);

// Set the installment quantity and value (could be obtained using the Installments
// service, that have an example here in \public\getInstallments.php)
$creditCard->setInstallment()->withParameters(1, '20.00');

// Set the credit card holder information
$creditCard->setHolder()->setBirthdate('01/10/1979');
$creditCard->setHolder()->setName('João da Silva'); // Equals in Credit Card

$creditCard->setHolder()->setPhone()->withParameters(
    11,
    '977777777'
);

$creditCard->setHolder()->setDocument()->withParameters(
    'CPF',
    '44257318830'
);

// Set the Payment Mode for this payment request
$creditCard->setMode('DEFAULT');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.

try {
    //Get the crendentials and register the boleto payment
    $result = $creditCard->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    // echo "<pre>";
    print_r($result);
} catch (Exception $e) {
    // echo "</br> <strong>";
    echo 'Erro: ' . $e->getMessage();
}
