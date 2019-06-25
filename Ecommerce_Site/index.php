<?php
ob_start();
require_once './classes/product.php';
$obj_product = new Product();
$query_result = $obj_product->select_published_category();
$manu_result = $obj_product->select_published_menufacturer();
$sub_category = $obj_product->select_published_sub_category();
$new_product = $obj_product->selectAllNewProduct();
$latest_product_result = $obj_product->selectAlllatestProduct();
if(isset($_GET['option'])){

    if($_GET['option']=='category'){
        $category_id = $_GET['category_id'];
        $product_result = $obj_product->select_published_product_by_category_id($category_id);
    }
    else if($_GET['option']=='menufacturer'){
        $menufacturer_id = $_GET['menufacturer_id'];
        $product_result = $obj_product->select_published_product_by_menufacturer_id($menufacturer_id);
    }
//    else if($_GET['option']=='product'){
//        $product_id = $_GET['product_id'];
//        $product_result = $obj_product->view($product_id);
//    }
}else{
    $product_result = $obj_product->select_published_product();
}
require_once './classes/Cart.php';
$obj_cart = new Cart();
if(isset($_GET['status'])){
    if($_GET['status']=='remove'){
        $cart_id = $_GET['cart_id'];
        $obj_cart->remove_cart_product($cart_id);
    }
}
?>
<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->

<!-- Mirrored from velikorodnov.com/html/flatastic/classic/index_layout_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Mar 2018 10:13:01 GMT -->
<head>
    <title>Dream Bird | Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--meta info-->
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="icon" type="image/ico" href="./asset/front_end/images/fav.ico">
    <!--stylesheet include-->
    <link rel="stylesheet" type="text/css" media="all" href="./asset/front_end/css/flexslider.css">
    <link rel="stylesheet" type="text/css" media="all" href="./asset/front_end/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="./asset/front_end/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" media="all" href="./asset/front_end/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" media="all" href="./asset/front_end/css/jquery.custom-scrollbar.css">
    <link rel="stylesheet" type="text/css" media="all" href="./asset/front_end/css/style.css">
    <!--font include-->
    <link href="./asset/front_end/css/font-awesome.min.css" rel="stylesheet">
    <script src="./asset/front_end/js/modernizr.js"></script>
</head>
<body>
<!--boxed layout-->
<div class="wide_layout relative w_xs_auto">
    <!--[if (lt IE 9) | IE 9]>
    <div style="background:#fff;padding:8px 0 10px;">
        <div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
    <![endif]-->
    <!--markup header type 2-->
    <header role="banner">
        <!--header top part-->
        <section class="h_top_part">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-3 t_xs_align_c">
                        <p class="f_size_small">Welcome visitor can you	<a href="#" data-popup="#login_popup">Log In</a> or <a href="#" data-popup="#signup_popup">Create an Account</a> </p>
                    </div>

                </div>
            </div>
        </section>
        <!--header bottom part-->
        <section class="h_bot_part container">
            <div class="clearfix row">
                <div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">
                    <a href="index.php" class="logo m_xs_bottom_15 d_xs_inline_b">
                        <!--                        <img src="./asset/front_end/images/logo.png" alt="">-->
                        <h1 style="color:#d2322d;"><b>DREAM BIRD</b></h1>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c m_xs_bottom_15">
                            <dl class="l_height_medium">
                                <dt class="f_size_small">Call Us</dt>
                                <dd class="f_size_ex_large color_dark"><b>(+880) 1853995994</b></dd>
                            </dl>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <form class="relative type_2" role="search" action="" method="post">
                                <input type="text" placeholder="Search" name="search" class="r_corners f_size_medium full_width">
                                <button type="submit" name="search" class="f_right search_button tr_all_hover f_xs_none">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--main menu container-->
        <div class="container">
            <section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20">
                <!--button for responsive menu-->
                <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_15">
                    <span class="centered_db r_corners"></span>
                    <span class="centered_db r_corners"></span>
                    <span class="centered_db r_corners"></span>
                </button>
                <!--main menu-->
                <nav role="navigation" class="f_left f_xs_none d_xs_none t_xs_align_l">
                    <ul class="horizontal_list main_menu clearfix">
                        <li class="current relative f_xs_none m_xs_bottom_5"><a href="index.php" class="tr_delay_hover color_light tt_uppercase"><b>Home</b></a>
                        </li>
                        <li class="relative f_xs_none m_xs_bottom_5"><a href="category.php" class="tr_delay_hover color_light tt_uppercase"><b>Men's</b></a>
                            <!--sub menu-->
                            <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
                                <div class="f_left f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Products</b>
                                    <ul class="sub_menu first">
                                        <li><a class="color_dark tr_delay_hover" href="cloth.php">Clothing</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="compare.php">Wallets</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="cat_wise_pro.php">Footwear</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="manufacturer.php">Watches</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Bags</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Caps & Hats</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Hair Accessories</a></li>
                                    </ul>
                                </div>
                                <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Accessories</b>
                                    <ul class="sub_menu">
                                        <li><a class="color_dark tr_delay_hover" href="#">Perfumes</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Belts</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Shirts</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Jeans</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Sunglasses</a></li>
                                    </ul>
                                </div>
                                <img src="./asset/front_end/images/man_img_1.jpg" class="d_sm_none f_right m_bottom_10" alt="">
                            </div>
                        </li>
                        <li class="relative f_xs_none m_xs_bottom_5"><a href="category.php" class="tr_delay_hover color_light tt_uppercase"><b>Women's</b></a>
                            <!--sub menu-->
                            <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
                                <div class="f_left f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Products</b>
                                    <ul class="sub_menu first">
                                        <li><a class="color_dark tr_delay_hover" href="cloth.php?id=<?php echo $row['category_id'];?>">Clothing</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="compare.php">Jewellery</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="cat_wise_pro.php">Skirt</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="manufacturer.php">Jeans</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">T-Shirt</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Bags</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Footwear</a></li>
                                    </ul>
                                </div>
                                <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Accessories</b>
                                    <ul class="sub_menu">
                                        <li><a class="color_dark tr_delay_hover" href="#">Bags & Purces</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Belts</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Shoes</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Bands</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Shari</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Sunglasses</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Hair Accessories</a></li>
                                    </ul>
                                </div>
                                <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Others</b>
                                    <ul class="sub_menu">
                                        <li><a class="color_dark tr_delay_hover" href="#">Legins</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Long Sleeved</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Short Sleeved</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Sleeveless</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Tanks</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Tunics</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Cosmetics</a></li>
                                    </ul>
                                </div>
                                <img src="./asset/front_end/images/category_img_7.jpg" width="300px" height="300px" class="d_sm_none f_right m_bottom_10" alt="">
                            </div>
                        </li>
                        <li class="relative f_xs_none m_xs_bottom_5"><a href="category.php" class="tr_delay_hover color_light tt_uppercase"><b>Electronics</b></a>
                            <!--sub menu-->
                            <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
                                <div class="f_left f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Products</b>
                                    <ul class="sub_menu first">
                                        <li><a class="color_dark tr_delay_hover" href="category.php">Laptop</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="compare.php">Mobile</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="cat_wise_pro.php">Desktop</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="manufacturer.php">Speaker</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Light</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Fan</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">TV Card</a></li>
                                    </ul>
                                </div>
                                <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Accessories</b>
                                    <ul class="sub_menu">
                                        <li><a class="color_dark tr_delay_hover" href="#">Television</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">AC</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Mouse</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Key Board</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Head Phone</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Iron</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Oven</a></li>
                                    </ul>
                                </div>
                                <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                                    <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Others</b>
                                    <ul class="sub_menu">
                                        <li><a class="color_dark tr_delay_hover" href="#">Blander</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Refrigerator</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Cycle</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Washing Machine</a></li>
                                        <li><a class="color_dark tr_delay_hover" href="#">Electric Stoup</a></li>
                                    </ul>
                                </div>
                                <img src="./asset/front_end/images/hp-laptop2.jpg" height="300px" width="300px" class="d_sm_none f_right m_bottom_10" alt="">
                            </div>
                        </li>
                        <li class="relative f_xs_none m_xs_bottom_5"><a href="about.php" class="tr_delay_hover color_light tt_uppercase"><b>About</b></a>
                        </li>
                        <li class="relative f_xs_none m_xs_bottom_5"><a href="contact.php" class="tr_delay_hover color_light tt_uppercase"><b>Contact</b></a></li>
                    </ul>
                </nav>
                <ul class="f_right horizontal_list clearfix t_align_l t_xs_align_c site_settings d_xs_inline_b f_xs_none">
                    <!--shopping cart-->
                    <li class="m_left_5 relative container3d" id="shopping_button">
                        <a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
							<?php
                            $session_id = session_id();
                            $result = $obj_cart->select_cart_product_by_session_id($session_id);
                            $total=0;
                            $subtotal=0;
                            while ($row = mysqli_fetch_assoc($result)){
                            ?>
											<span class="d_inline_middle shop_icon">
										<i class="fa fa-shopping-cart"></i>
										<span class="count tr_delay_hover type_2 circle t_align_c"><?php echo $row['product_sales_quantity'];?></span>
									</span>
                            <b>
                                <?php
                                $subtotal = $row['product_price']*$row['product_sales_quantity'];
                                ?>
                            </b>
                            <?php }
                            $total=$total+$subtotal;
                            $vat=(($total*4.5)/100);
                            $discount = (($total*10)/100);
                            ?>
                            <?php
                            $grand_total=$total+$vat-$discount;
                            echo 'BDT-'.$grand_total;
                            ?>
                        </a>
                        <div class="shopping_cart top_arrow tr_all_hover r_corners">
                            <div class="f_size_medium sc_header">Recently added item(s)</div>
                            <?php
                            $session_id = session_id();
                            $result = $obj_cart->select_cart_product_by_session_id($session_id);
                            $total=0;
                            //$subtotal ='';
                            while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <ul class="products_list">
                                <li>
                                    <div class="clearfix">
                                        <!--product image-->
                                        <img class="f_left m_right_10" src="./admin/<?php echo $row['product_image'];?>" height="80px" width="70px" alt="">
                                        <!--product description-->
                                        <div class="f_left product_description">
                                            <a href="#" class="color_dark m_bottom_5 d_block"><?php echo $row['product_name'];?></a>
                                        </div>
                                        <!--product price-->
                                        <div class="f_left f_size_medium">
                                            <div class="clearfix">
                                                <?php echo $row['product_sales_quantity'];?> X <b class="color_dark">
                                                    <?php
                                                    echo $row['product_price'];
                                                    ?></b>
                                            </div>
                                            <button class="close_product color_dark tr_hover" href="?status=remove&cart_id=<?php echo $row['cart_id'];?>"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php
                                $subtotal = $row['product_price']*$row['product_sales_quantity'];
                            }
                            $total=$total+$subtotal;
                            ?>
                            <!--total price-->
                            <ul class="total_price bg_light_color_1 t_align_r color_dark">
                                <li class="m_bottom_10">Tax: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                                         <?php
                                         $vat=(($total*4.5)/100);
                                         echo 'BDT-'.$vat;
                                         ?>
                                    </span></li>
                                <li class="m_bottom_10">Discount: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                                        <?php
                                        $discount = (($total*10)/100);
                                        echo 'BDT'.$discount;
                                        ?>
                                    </span></li>
                                <li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">
                                        <?php
                                        $grand_total=($total+$vat-$discount);
                                        echo 'BDT-'.$grand_total;
                                        ?>
                                    </b></li>
                            </ul>
                            <div class="sc_footer t_align_c">
                                <a href="cart.php" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">View Cart</a>
                                <a href="#" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </header>
    <?php
    if(isset($front_end)) {
        if ($front_end == NULL) {
            include './front_end/slider_image.php';
        }
    }
    else{
        include './front_end/slider_image.php';
    }
    ?>
    <?php
    if(isset($front_end)) {
        if ($front_end == NULL) {
            include './front_end/main_content.php';
            }
            if ($front_end == 'product_details.php') {
            include './front_end/product_details.php';
        }elseif($front_end == 'shopping_cart.php'){
            include './front_end/shopping_cart.php';
            }
            elseif($front_end == 'category_grid.php'){
                include './front_end/category_grid.php';
            }
            elseif($front_end == 'compare_products.php'){
                include './front_end/compare_products.php';
            }
            elseif($front_end == 'contact_form.php'){
                include './front_end/contact_form.php';
            }
            elseif($front_end == 'category_wise_product.php'){
                include './front_end/category_wise_product.php';
            }
            elseif($front_end == 'manufacturer_form.php'){
                include './front_end/manufacturer_form.php';
            }
            elseif($front_end == 'manufacturer_details.php'){
                include './front_end/manufacturer_details.php';
            }
            elseif($front_end == 'about_form.php'){
                include './front_end/about_form.php';
            }
            elseif($front_end == 'clothing.php'){
                include './front_end/clothing.php';
            }
    }
    else{
            include './front_end/main_content.php';
    }
    ?>
</div>
</div>
    <!--markup footer-->
    <footer id="footer" class="type_2">
        <div class="footer_top_part">
            <div class="container t_align_c m_bottom_20">
                <!--social icons-->
                <ul class="clearfix d_inline_b horizontal_list social_icons">
                    <li class="facebook m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Facebook</span>
                        <a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="twitter m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Twitter</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="google_plus m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Google Plus</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="rss m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Rss</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-rss"></i>
                        </a>
                    </li>
                    <li class="pinterest m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Pinterest</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </li>
                    <li class="instagram m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Instagram</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="linkedin m_left_5 m_bottom_5 m_sm_left_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">LinkedIn</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="vimeo m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Vimeo</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-vimeo-square"></i>
                        </a>
                    </li>
                    <li class="youtube m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Youtube</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </li>
                    <li class="flickr m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Flickr</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-flickr"></i>
                        </a>
                    </li>
                    <li class="envelope m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Contact Us</span>
                        <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-envelope-o"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="divider_type_4 m_bottom_50">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                        <h3 class="color_light_2 m_bottom_20">About</h3>
                        <p class="m_bottom_15">Dream Bird is one of the latest ecommerce site where you will find everything you want to buy, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem.</p>
                        <p>Interdum vitae, dapibus ac, scelerisque.
                            vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">
                        <h3 class="color_light_2 m_bottom_20">The Service</h3>
                        <ul class="vertical_list">
                            <li><a class="color_light tr_delay_hover" href="#">My account<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Order history<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Wishlist<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Categories<i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">
                        <h3 class="color_light_2 m_bottom_20">Information</h3>
                        <ul class="vertical_list">
                            <li><a class="color_light tr_delay_hover" href="#">About us<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Delivery<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Privacy policy<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Terms &amp; condition<i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">
                        <h3 class="color_light_2 m_bottom_20">Catalog</h3>
                        <ul class="vertical_list">
                            <li><a class="color_light tr_delay_hover" href="#">New Collection<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Best Sellers<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Specials<i class="fa fa-angle-right"></i></a></li>
                            <li><a class="color_light tr_delay_hover" href="#">Manufacturers<i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h3 class="color_light_2 m_bottom_20">Contact Us</h3>
                        <ul class="c_info_list">
                            <li class="m_bottom_10">
                                <div class="clearfix m_bottom_15">
                                    <i class="fa fa-map-marker f_left"></i>
                                    <p class="contact_e">Bashila Road,<br> Mohammadpur, Dhaka-1207.</p>
                                </div>
                            </li>
                            <li class="m_bottom_10">
                                <div class="clearfix m_bottom_10">
                                    <i class="fa fa-phone f_left"></i>
                                    <p class="contact_e">+8801672243451</p>
                                </div>
                            </li>
                            <li class="m_bottom_10">
                                <div class="clearfix m_bottom_10">
                                    <i class="fa fa-envelope f_left"></i>
                                    <a class="contact_e color_light" href="mailto:#">anowarh761@gmail.com</a>
                                </div>
                            </li>
                            <li>
                                <div class="clearfix">
                                    <i class="fa fa-clock-o f_left"></i>
                                    <p class="contact_e">Saturday - Thursday: 08.00am-12.00am <br>Saturday: 09.00am-10.00pm<br> Friday: closed</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--copyright part-->
        <div class="footer_bottom_part">
            <div class="container clearfix t_mxs_align_c">
                <p class="f_left f_mxs_none m_mxs_bottom_10">&copy; 2018 <span class="color_light">Dream Bird</span>. All Rights Reserved.</p>
                <ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">
                    <li><img src="./asset/front_end/images/payment_img_1.png" alt=""></li>
                    <li class="m_left_5"><img src="./asset/front_end/images/payment_img_2.png" alt=""></li>
                    <li class="m_left_5"><img src="./asset/front_end/images/payment_img_3.png" alt=""></li>
                    <li class="m_left_5"><img src="./asset/front_end/images/payment_img_4.png" alt=""></li>
                    <li class="m_left_5"><img src="./asset/front_end/images/payment_img_5.png" alt=""></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<!--social widgets-->
<ul class="social_widgets d_xs_none">
    <!--facebook-->
    <li class="relative">
        <button class="sw_button t_align_c facebook"><i class="fa fa-facebook"></i></button>
        <div class="sw_content">
            <h3 class="color_dark m_bottom_20">Join Us on Facebook</h3>
            <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=235&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=438889712801266" style="border:none; overflow:hidden; width:235px; height:258px;"></iframe>
        </div>
    </li>
    <!--twitter feed-->
    <li class="relative">
        <button class="sw_button t_align_c twitter"><i class="fa fa-twitter"></i></button>
        <div class="sw_content">
            <h3 class="color_dark m_bottom_20">Latest Tweets</h3>
            <div class="twitterfeed m_bottom_25"></div>
            <a role="button" class="button_type_4 d_inline_b r_corners tr_all_hover color_light tw_color" href="https://twitter.com/fanfbmltemplate">Follow on Twitter</a>
        </div>
    </li>
    <!--contact form-->
    <li class="relative">
        <button class="sw_button t_align_c contact"><i class="fa fa-envelope-o"></i></button>
        <div class="sw_content">
            <h3 class="color_dark m_bottom_20">Contact Us</h3>
            <p class="f_size_medium m_bottom_15">Lorem ipsum dolor sit amet, consectetuer adipis mauris</p>
            <form id="contactform" class="mini">
                <input class="f_size_medium m_bottom_10 r_corners full_width" type="text" name="cf_name" placeholder="Your name">
                <input class="f_size_medium m_bottom_10 r_corners full_width" type="email" name="cf_email" placeholder="Email">
                <textarea class="f_size_medium r_corners full_width m_bottom_20" placeholder="Message" name="cf_message"></textarea>
                <button type="submit" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2">Send</button>
            </form>
        </div>
    </li>
    <!--contact info-->
    <li class="relative">
        <button class="sw_button t_align_c googlemap"><i class="fa fa-map-marker"></i></button>
        <div class="sw_content">
            <h3 class="color_dark m_bottom_20">Store Location</h3>
            <ul class="c_info_list">
                <li class="m_bottom_10">
                    <div class="clearfix m_bottom_15">
                        <i class="fa fa-map-marker f_left color_dark"></i>
                        <p class="contact_e">Bashila Road,<br> Mohammadpur,Dhaka-1207.</p>
                    </div>
                    <iframe class="r_corners full_width" id="gmap_mini" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=Mohammadpur,+Dhaka,+Dh,+Bangladesh&amp;aq=0&amp;oq=mohammadpur&amp;sll=37.0625,-95.677068&amp;sspn=65.430355,129.814453&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%9C%D0%B0%D0%BD%D1%85%D1%8D%D1%82%D1%82%D0%B5%D0%BD,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%9D%D1%8C%D1%8E+%D0%99%D0%BE%D1%80%D0%BA,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA&amp;ll=40.790278,-73.959722&amp;spn=0.015612,0.031693&amp;z=13&amp;output=embed"></iframe>
                </li>
                <li class="m_bottom_10">
                    <div class="clearfix m_bottom_10">
                        <i class="fa fa-phone f_left color_dark"></i>
                        <p class="contact_e">800-559-65-80</p>
                    </div>
                </li>
                <li class="m_bottom_10">
                    <div class="clearfix m_bottom_10">
                        <i class="fa fa-envelope f_left color_dark"></i>
                        <a class="contact_e default_t_color" href="mailto:#">anowarh761@gmail.com</a>
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <i class="fa fa-clock-o f_left color_dark"></i>
                        <p class="contact_e">Saturday - Thursday: 08.00am-12.00am <br>Saturday: 09.00am-10.00pm<br> Friday: closed</p>
                    </div>
                </li>
            </ul>
        </div>
    </li>
</ul>
<!--login popup-->
<div class="popup_wrap d_none" id="login_popup">
    <section class="popup r_corners shadow">
        <button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
        <h3 class="m_bottom_20 color_dark">Log In</h3>
        <form>
            <ul>
                <li class="m_bottom_15">
                    <label for="username" class="m_bottom_5 d_inline_b">Username</label><br>
                    <input type="text" name="" id="username" class="r_corners full_width">
                </li>
                <li class="m_bottom_25">
                    <label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
                    <input type="password" name="" id="password" class="r_corners full_width">
                </li>
                <li class="m_bottom_15">
                    <input type="checkbox" class="d_none" id="checkbox_10"><label for="checkbox_10">Remember me</label>
                </li>
                <li class="clearfix m_bottom_30">
                    <button class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15">Log In</button>
                    <div class="f_right f_size_medium f_mxs_none">
                        <a href="#" class="color_dark">Forgot your password?</a><br>
                        <a href="#" class="color_dark">Forgot your username?</a><br>
                        <a href="admin/index.php" class="color_green">Admin login</a>
                    </div>
                </li>
            </ul>
        </form>
        <footer class="bg_light_color_1 t_mxs_align_c">
            <h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New Customer?</h3>
            <a href="#" role="button" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Create an Account</a>
        </footer>
    </section>
</div>
<div class="popup_wrap d_none" id="signup_popup">
    <section class="popup r_corners shadow">
        <button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large" id="signup_popup"><i class="fa fa-times"></i></button>
        <h3 class="m_bottom_20 color_dark"><b style="color: #0044cc">Create Account</b></h3>
        <form>
            <ul>
                <li class="m_bottom_15">
                    <label for="fullname" class="m_bottom_5 d_inline_b">FullName</label><br>
                    <input type="text" name="" id="fullname" class="r_corners full_width">
                </li>
                <li class="m_bottom_15">
                    <label for="username" class="m_bottom_5 d_inline_b">Username</label><br>
                    <input type="text" name="" id="username" class="r_corners full_width">
                </li>
                <li class="m_bottom_15">
                    <label for="email" class="m_bottom_5 d_inline_b">Email Address</label><br>
                    <input type="email" name="" id="email" class="r_corners full_width">
                </li>
                <li class="m_bottom_25">
                    <label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
                    <input type="password" name="" id="password" class="r_corners full_width">
                </li>
                <li class="m_bottom_15">
                    <label for="re_password" class="m_bottom_5 d_inline_b">Confirm Password</label><br>
                    <input type="password" name="" id="re_password" class="r_corners full_width">
                </li>
                <li class="clearfix m_bottom_30">
                    <button class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15">Create Account</button>
                    <br><br>
                    <p class="color_grey">Are You Admin? Then </p>
                    <a href="admin/index.php" class="color_green">Admin login</a>
                </li>
            </ul>
        </form>
    </section>
</div>
<button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
<!--scripts include-->
<script src="./asset/front_end/js/jquery-2.1.0.min.js"></script>
<script src="./asset/front_end/js/retina.js"></script>
<script src="./asset/front_end/js/jquery.flexslider-min.js"></script>
<script src="./asset/front_end/js/waypoints.min.js"></script>
<script src="./asset/front_end/js/jquery.isotope.min.js"></script>
<script src="./asset/front_end/js/owl.carousel.min.js"></script>
<script src="./asset/front_end/js/jquery.tweet.min.js"></script>
<script src="./asset/front_end/js/jquery.custom-scrollbar.js"></script>
<script src="./asset/front_end/js/scripts.js"></script>
<script type="text/javascript" src="../../../../s7.addthis.com/asset/front_end//js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
</body>

<!-- Mirrored from velikorodnov.com/html/flatastic/classic/index_layout_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Mar 2018 10:13:22 GMT -->
</html>