<?php
include_once '../classes/product.php';
$obj_product = new Product();
$product_id = $_GET['id'];
$page = 'edit_product_form.php';
include 'dashboard.php';