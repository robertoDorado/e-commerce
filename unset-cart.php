<?php
session_start();
require_once "class/carrinho.class.php";
$cart = new Cart;

$id = $_GET['id'];

$cart->delCartItem($id);
header("Location: carrinho.php");