<?php
session_start();
require_once "class/carrinho.class.php";
$cart = new Cart;

$id = $_GET['id'];
$qtd = $_GET['qtd'];

$cart->delCartItem($id, $qtd);
header("Location: carrinho.php");