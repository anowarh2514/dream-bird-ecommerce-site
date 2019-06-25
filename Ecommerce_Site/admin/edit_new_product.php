<?php
include_once '../classes/product.php';
$obj_product = new Product();
$new_product_id = $_GET['id'];
$page = 'edit_new_product_form.php';
include 'dashboard.php';