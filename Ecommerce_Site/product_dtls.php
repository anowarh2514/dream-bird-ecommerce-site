<?php
require_once './classes/Cart.php';
$obj_cart = new Cart();
$product_id=$_GET['id'];
$menufacturer_id =$_GET['id'];
$front_end='product_details.php';
include 'index.php';
