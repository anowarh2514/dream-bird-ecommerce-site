<?php
if(isset($_POST['btn_update'])){
    $obj_cart->update_cart_product($_POST);
}
if(isset($_GET['status'])){
    if($_GET['status']=='remove'){
        $cart_id = $_GET['cart_id'];
        $obj_cart->remove_cart_product($cart_id);
    }
}
?>

<!--breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <ul class="horizontal_list clearfix bc_list f_size_medium">
            <li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
            <li class="m_right_10 current"><a href="#" class="default_t_color">Checkout<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
            <li><a href="#" class="default_t_color">Shopping Cart</a></li>
        </ul>
    </div>
</section>
<!--content-->
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <h2 class="tt_uppercase color_dark m_bottom_25">Cart</h2>
                <!--cart table-->
                <table class="table_type_4 responsive_table full_width r_corners wraper shadow t_align_l t_xs_align_c m_bottom_30">
                    <thead>
                    <tr class="f_size_large">
                        <!--titles for td-->
                        <th>Product Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $session_id = session_id();
                    $result = $obj_cart->select_cart_product_by_session_id($session_id);
                    $total=0;
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <!--Product name and image-->
                        <td data-title="Product Image" class="t_md_align_c">
                            <img src="./admin/<?php echo $row['product_image'];?>" height="120px" width="100px" alt="" class="m_md_bottom_5 d_xs_block d_xs_centered">
                        </td>
                        <!--product key-->
                        <td data-title="name"><?php echo $row['product_name'];?></td>
                        <!--product price-->
                        <td data-title="Price">
                            <p class="f_size_large color_dark">BDT-<?php echo $row['product_price'];?></p>
                        </td>
                        <!--quanity-->
                        <td data-title="Quantity">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">
                                <button class="bg_tr d_block f_left" data-direction="down">-</button>
                                <input type="text" name="product_sales_quantity" value="<?php echo $row['product_sales_quantity'];?>" class="f_left">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>" class="f_left">
                                <button class="bg_tr d_block f_left" data-direction="up">+</button>
                            </div>
                            <div>
                                <button type="submit" name="btn_update"><i class="fa fa-check f_size_medium m_right_5"></i>Update</button><br>
                                <a href="?status=remove&cart_id=<?php echo $row['cart_id'];?>" class="color_dark"><i class="fa fa-times f_size_medium m_right_5"></i>Remove</a><br>
                            </div>
                            </form>
                        </td>

                        <!--subtotal-->
                        <td data-title="Subtotal">
                            <p class="f_size_large fw_medium scheme_color">
                                BDT-<?php
                                $subtotal = $row['product_price']*$row['product_sales_quantity'];
                                echo $subtotal;
                            ?></p>
                        </td>
                    </tr>
                    <?php
                    $total = $total+$subtotal;
                    }
                    ?>
                    <!--prices-->
                    <tr>
                        <td colspan="4">
                            <p class="fw_medium f_size_large t_align_r t_xs_align_c">Discount:</p>
                        </td>
                        <td colspan="1">
                            <p class="fw_medium f_size_large color_dark">
                                <?php
                                $discount = (($total*10)/100);
                                echo 'BDT'.' -'.$discount;
                                ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p class="fw_medium f_size_large t_align_r t_xs_align_c">Total:</p>
                        </td>
                        <td colspan="1">
                            <p class="fw_medium f_size_large color_dark">BDT-<?php echo $total; ?></p>
                        </td>
                    </tr>
                        <td colspan="4">
                            <p class="fw_medium f_size_large t_align_r t_xs_align_c">Total VAT:</p>
                        </td>
                        <td colspan="1">
                            <p class="fw_medium f_size_large color_dark">
                                <?php
                                $vat=(($total*4.5)/100);
                                echo 'BDT-'.$vat;
                                ?>
                            </p>
                        </td>
                    </tr>
                    <!--total-->
                    <tr>
                        <td colspan="4" class="v_align_m d_ib_offset_large t_xs_align_l">
                            <!--coupon-->
                            <form class="d_ib_offset_0 d_inline_middle half_column d_xs_block w_xs_full m_xs_bottom_5">
                                <input type="text" placeholder="Enter your coupon code" name="" class="r_corners f_size_medium">
                                <button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">Save</button>
                            </form>
                            <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_inline_middle half_column d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">Grand Total:</p>
                        </td>
                        <td colspan="1" class="v_align_m">
                            <p class="fw_medium f_size_large scheme_color m_xs_bottom_10">
                                <?php
                                $grand_total=$total+$vat-$discount;
                                echo 'BDT-'.$grand_total;
                                ?>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--tabs-->
                <div class="tabs m_bottom_45">
                    <!--tabs navigation-->
                    <nav>
                        <ul class="tabs_nav horizontal_list clearfix">
                            <li><a href="#tab-1" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Login</a></li>
                            <li><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Register</a></li>
                        </ul>
                    </nav>
                    <section class="tabs_content shadow r_corners">
                        <div id="tab-1">
                            <!--login form-->
                            <h5 class="fw_medium m_bottom_15">I am Already Registered</h5>
                            <form>
                                <ul>
                                    <li class="clearfix m_bottom_15">
                                        <div class="half_column type_2 f_left">
                                            <label for="username" class="m_bottom_5 d_inline_b">Username</label>
                                            <input type="text" id="username" name="" class="r_corners full_width m_bottom_5">
                                            <a href="#" class="color_dark f_size_medium">Forgot your username?</a>
                                        </div>
                                        <div class="half_column type_2 f_left">
                                            <label for="pass" class="m_bottom_5 d_inline_b">Password</label>
                                            <input type="password" id="pass" name="" class="r_corners full_width m_bottom_5">
                                            <a href="#" class="color_dark f_size_medium">Forgot your password?</a>
                                        </div>
                                    </li>
                                    <li class="m_bottom_15">
                                        <input type="checkbox" class="d_none" name="checkbox_4" id="checkbox_4"><label for="checkbox_4">Remember me</label>
                                    </li>
                                    <li><button class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">Log In</button></li>
                                </ul>
                            </form>
                        </div>
                        <br><br>
                        <div id="tab-2">
                            <form action="" method="post">
                                <ul>
                                    <h2 style="color: green"><b>Registration</b></h2>
                                    <br><br>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">First Name</label>
                                        <input type="text" id="u_name" name="firstname" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">Last Name</label>
                                        <input type="text" id="u_name" name="lastname" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_email" class="d_inline_b m_bottom_5 required">Email</label>
                                        <input type="email" id="u_email" name="email_address" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_pass" class="d_inline_b m_bottom_5 required">Password</label>
                                        <input type="password" id="u_pass" name="password" class="r_corners full_width">
                                    </li>
                                    <li>
                                        <label for="u_repeat_pass" class="d_inline_b m_bottom_5 required">Confirm Password</label>
                                        <input type="password" id="u_repeat_pass" name="" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">Address</label>
                                        <input type="text" id="u_name" name="address" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">Mobile</label>
                                        <input type="number" id="u_name" name="mobile_number" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">City</label>
                                        <input type="text" id="u_name" name="city" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">Country</label>
                                        <select name="country" id="u_name" class="r_corners full_width">
                                            <option  value="">----------Select Your Country------------</option>
                                            <option  value="BD">Bangladesh</option>
                                            <option  value="JP">Japan</option>
                                            <option  value="AUS">Australia</option>
                                        </select>
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="u_name" class="d_inline_b m_bottom_5 required">Zip Code</label>
                                        <input type="text" id="u_name" name="zip_code" class="r_corners full_width">
                                    </li>
                                    <li><button type="submit" name="sign_up_button" class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">Register</button></li>
                                </ul>
                            </form>
                        </div>
                    </section>
                </div>

            </section>
            <!--right column-->
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <!--widgets-->

                <?php include 'category.php';?>

                <!--compare products-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Compare Products</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15 relative cw_product">
                            <img src="images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_25 relative cw_product">
                            <img src="images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Elemenum vel</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <a href="#" class="color_dark"><i class="fa fa-files-o m_right_10"></i>Go to Compare</a>
                    </div>
                </figure>
                <!--wishlist-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Wishlist</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15 relative cw_product">
                            <img src="images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_25 relative cw_product">
                            <img src="images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Elemenum vel</a>
                            <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                        </div>
                        <a href="#" class="color_dark"><i class="fa fa-heart-o m_right_10"></i>Go to Wishlist</a>
                    </div>
                </figure>
                <!--banner-->
                <a href="#" class="d_block r_corners m_bottom_30">
                    <img src="images/banner_img_6.jpg" alt="">
                </a>
                <!--Bestsellers-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Bestsellers</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15">
                            <img src="images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Ut dolor dapibus</a>
                            <!--rating-->
                            <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                            </ul>
                            <p class="scheme_color">$61.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_15">
                            <img src="images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Elementum vel</a>
                            <!--rating-->
                            <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                            </ul>
                            <p class="scheme_color">$57.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_5">
                            <img src="images/bestsellers_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link">Crsus eleifend elit</a>
                            <!--rating-->
                            <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li class="active">
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star-o empty tr_all_hover"></i>
                                    <i class="fa fa-star active tr_all_hover"></i>
                                </li>
                            </ul>
                            <p class="scheme_color">$24.00</p>
                        </div>
                    </div>
                </figure>
                <!--tags-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Tags</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="tags_list">
                            <a href="#" class="color_dark d_inline_b v_align_b">accessories,</a>
                            <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">bestseller,</a>
                            <a href="#" class="color_dark d_inline_b v_align_b">clothes,</a>
                            <a href="#" class="color_dark d_inline_b f_size_big v_align_b">dresses,</a>
                            <a href="#" class="color_dark d_inline_b v_align_b">fashion,</a>
                            <a href="#" class="color_dark d_inline_b f_size_large v_align_b">men,</a>
                            <a href="#" class="color_dark d_inline_b v_align_b">pants,</a>
                            <a href="#" class="color_dark d_inline_b v_align_b">sale,</a>
                            <a href="#" class="color_dark d_inline_b v_align_b">short,</a>
                            <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">skirt,</a>
                            <a href="#" class="color_dark d_inline_b v_align_b">top,</a>
                            <a href="#" class="color_dark d_inline_b f_size_big v_align_b">women</a>
                        </div>
                    </div>
                </figure>
                <!--New products-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">New Products</h3>
                    </figcaption>
                    <div class="widget_content">
                        <div class="clearfix m_bottom_15">
                            <img src="images/new_products_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Ut tellus dolor dapibus</a>
                            <p class="scheme_color">$61.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_15">
                            <img src="images/new_products_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Elementum vel</a>
                            <p class="scheme_color">$57.00</p>
                        </div>
                        <hr class="m_bottom_15">
                        <div class="clearfix m_bottom_5">
                            <img src="images/new_products_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block m_bottom_5 bt_link">Crsus eleifend elit</a>
                            <p class="scheme_color">$24.00</p>
                        </div>
                    </div>
                </figure>
                <!--Specials-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption class="clearfix relative">
                        <h3 class="color_light f_left f_sm_none m_sm_bottom_10 m_xs_bottom_0">Specials</h3>
                        <div class="f_right nav_buttons_wrap_type_2 tf_sm_none f_sm_none clearfix">
                            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large color_light t_align_c bg_tr f_left tr_delay_hover r_corners sc_prev"><i class="fa fa-angle-left"></i></button>
                            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large color_light t_align_c bg_tr f_left m_left_5 tr_delay_hover r_corners sc_next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </figcaption>
                    <div class="widget_content">
                        <div class="specials_carousel">
                            <!--carousel item-->
                            <div class="specials_item">
                                <a href="#" class="d_block d_xs_inline_b wrapper m_bottom_20">
                                    <img class="tr_all_long_hover" src="images/product_img_6.jpg" alt="">
                                </a>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                                <p class="f_size_large m_bottom_15"><s>$79.00</s> <span class="scheme_color">$36.00</span></p>
                                <button class="button_type_4 mw_sm_0 r_corners color_light bg_scheme_color tr_all_hover m_bottom_5">Add to Cart</button>
                            </div>
                            <!--carousel item-->
                            <div class="specials_item">
                                <a href="#" class="d_block d_xs_inline_b wrapper m_bottom_20">
                                    <img class="tr_all_long_hover" src="images/product_img_7.jpg" alt="">
                                </a>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Integer rutrum ante </a></h5>
                                <p class="f_size_large m_bottom_15"><s>$79.00</s> <span class="scheme_color">$36.00</span></p>
                                <button class="button_type_4 mw_sm_0 r_corners color_light bg_scheme_color tr_all_hover m_bottom_5">Add to Cart</button>
                            </div>
                            <!--carousel item-->
                            <div class="specials_item">
                                <a href="#" class="d_block d_xs_inline_b wrapper m_bottom_20">
                                    <img class="tr_all_long_hover" src="images/product_img_5.jpg" alt="">
                                </a>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                                <p class="f_size_large m_bottom_15"><s>$79.00</s> <span class="scheme_color">$36.00</span></p>
                                <button class="button_type_4 mw_sm_0 r_corners color_light bg_scheme_color tr_all_hover m_bottom_5">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </figure>
                <!--Popular articles-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Popular Articles</h3>
                    </figcaption>
                    <div class="widget_content">
                        <article class="clearfix m_bottom_15">
                            <img src="images/article_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link p_vr_0">Aliquam erat volutpat.</a>
                            <p class="f_size_medium">50 comments</p>
                        </article>
                        <hr class="m_bottom_15">
                        <article class="clearfix m_bottom_15">
                            <img src="images/article_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Integer rutrum ante </a>
                            <p class="f_size_medium">34 comments</p>
                        </article>
                        <hr class="m_bottom_15">
                        <article class="clearfix m_bottom_5">
                            <img src="images/article_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Vestibulum libero nisl, porta vel</a>
                            <p class="f_size_medium">21 comments</p>
                        </article>
                    </div>
                </figure>
                <!--Latest articles-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Latest Articles</h3>
                    </figcaption>
                    <div class="widget_content">
                        <article class="clearfix m_bottom_15">
                            <img src="images/article_img_4.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block bt_link p_vr_0">Aliquam erat volutpat.</a>
                            <p class="f_size_medium">25 January, 2013</p>
                        </article>
                        <hr class="m_bottom_15">
                        <article class="clearfix m_bottom_15">
                            <img src="images/article_img_5.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Integer rutrum ante </a>
                            <p class="f_size_medium">21 January, 2013</p>
                        </article>
                        <hr class="m_bottom_15">
                        <article class="clearfix m_bottom_5">
                            <img src="images/article_img_6.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                            <a href="#" class="color_dark d_block p_vr_0 bt_link">Vestibulum libero nisl, porta vel</a>
                            <p class="f_size_medium">18 January, 2013</p>
                        </article>
                    </div>
                </figure>
            </aside>
        </div>
    </div>
</div>
