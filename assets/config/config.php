<?php 

if (!defined('KEY_TOKEN')) define('KEY_TOKEN', 'ABC.def-ghi_123*');
if (!defined('MONEDA')) define('MONEDA', '$');
// define("KEY_TOKEN", "ABC.def-ghi_123*");
// define("MONEDA", "$");

// session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}