<?php
session_start();
require_once "carrinho.class.php";

$cart = new Cart;

$arrayList = $cart->getList();

$jsonList = json_encode($arrayList);

echo $jsonList;