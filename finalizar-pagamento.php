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
    $valorFrete = addslashes($_POST['valor_frete']);
    $idPagSeguro = addslashes($_POST['id_pag_seguro']);
    $tokenCard = addslashes($_POST['token_card']);
    
    $items = $carrinho->getList();

    $formatCpfCliente1 =  str_replace(".", "", $cpfCliente);
    $formatCpfCliente2 =  str_replace("-", "", $formatCpfCliente1);

    $formatTelefoneCliente1 = str_replace("-", "", $telefoneCliente);
    $formatTelefoneCliente2 = str_replace(")", "", $formatTelefoneCliente1);
    $formatTelefoneCliente3 = str_replace("(", "", $formatTelefoneCliente2);
    $arrayTelefone = explode(" ", $formatTelefoneCliente3);

    $formatCepCliente = str_replace("-", "", $cepCliente);

    $formatParcela1 = str_replace("R$", "", $parcelaCartao);
    $formatParcela2 = str_replace("x", "", $formatParcela1);
    $formatParcela3 = str_replace(".", "", $formatParcela2);
    $formatParcela4 = str_replace(",", ".", $formatParcela3);
    $arrayParcela = explode(" ", $formatParcela4);

    $valorFreteFormat = str_replace(",", ".", $valorFrete);

    $price = 0;
    $frete =  floatval($valorFreteFormat) / count($items);
    $qtdParcelas = intval($arrayParcela[0]);
    $dddTelefone = intval($arrayTelefone[0]);


//Instantiate a new direct payment request, using Credit Card
$creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

/**
 * @todo Change the receiver Email
 */
$creditCard->setReceiverEmail('robertodorado7@gmail.com');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.
$creditCard->setReference($idUser);

// Set the currency
$creditCard->setCurrency("BRL");

// Add an item for this payment request
foreach($items as $itemsCart){

    $totalItems = $itemsCart['qtd'];
    $formatPriceProduct1 = str_replace("R$", "", $itemsCart['price']);
    $formatPriceProduct2 = str_replace(".", "", $formatPriceProduct1);
    $formatPriceProduct3 = str_replace(",", ".", $formatPriceProduct2);
    $formatPriceProduct4 = $formatPriceProduct3;
    $price += ($totalItems * $formatPriceProduct4) + $frete;
}
$idCompra = md5($itemsCart['id']);

$creditCard->addItems()->withParameters(
    $idCompra,
    $itemsCart['title'],
    1,
    $price
);

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
$creditCard->setSender()->setName($nomeCliente);
$creditCard->setSender()->setEmail($emailCliente);

$creditCard->setSender()->setPhone()->withParameters(
    $dddTelefone,
    $arrayTelefone[1]
);

$creditCard->setSender()->setDocument()->withParameters(
    'CPF',
    $formatCpfCliente2
);


$creditCard->setSender()->setHash($idPagSeguro);

$creditCard->setSender()->setIp('127.0.0.1');

// Set shipping information for this payment request
$creditCard->setShipping()->setAddress()->withParameters(
    $ruaCliente,
    $numeroEndereco,
    $bairroCliente,
    $formatCepCliente,
    $cidadeCliente,
    $estadoCliente,
    'BRA',
    $complementoEndereco
);

//Set billing information for credit card
$creditCard->setBilling()->setAddress()->withParameters(
    $ruaCliente,
    $numeroEndereco,
    $bairroCliente,
    $formatCepCliente,
    $cidadeCliente,
    $estadoCliente,
    'BRA',
    $complementoEndereco
);

// Set credit card token
$creditCard->setToken($tokenCard);

// Set the installment quantity and value (could be obtained using the Installments
// service, that have an example here in \public\getInstallments.php)
$creditCard->setInstallment()->withParameters(
    $qtdParcelas, 
    $arrayParcela[2]
);

// Set the credit card holder information
$creditCard->setHolder()->setBirthdate('01/10/1979');
$creditCard->setHolder()->setName(utf8_encode($nomeCartao)); // Equals in Credit Card

$creditCard->setHolder()->setPhone()->withParameters(
    $dddTelefone,
    $arrayTelefone[1]
);

$creditCard->setHolder()->setDocument()->withParameters(
    'CPF',
    $formatCpfCliente2
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
} catch (Exception $e) {
    // echo "</br> <strong>";
    echo "Erro no pagamento";
}

}
