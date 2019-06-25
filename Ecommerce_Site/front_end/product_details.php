<?php
$result  = $obj_product->select_product_by_id($product_id);
$row = mysqli_fetch_assoc($result);
$menufacturer_id = $row['menufacturer_id'];
$pro_result=$obj_product->select_menufacturer($menufacturer_id);
$category_id = $row['category_id'];
$related_result =$obj_product->select_related_product($category_id);
//$category_result = $obj_product->select_product_details_by_category_id($category_id);
if(isset($_POST['add_to_cart'])){
    $obj_cart->add_to_cart($_POST);
}
?>
    <!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li class="m_right_10"><a href="#" class="default_t_color">Product</a><i class="fa fa-angle-right d_inline_middle m_left_10"></i></li>
                <li><a href="#" class="default_t_color">Product Details</a></li>
            </ul>
        </div>
    </section>
    <!--content-->
    <div class="page_content_offset">
        <div class="container">
            <div class="row clearfix">
                <!--left content column-->
                <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                    <div class="clearfix m_bottom_30 t_xs_align_c">
                        <div class="photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">
                            <span class="hot_stripe"><img src="../asset/front_end/images/sale_product.png" alt=""></span>
                            <div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">
                                <img id="zoom_image" src="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>" class="tr_all_hover"  alt="">
                                <a href="./admin/<?php echo $row['product_image']; ?>" class="d_block button_type_5 r_corners tr_all_hover box_s_none color_light p_hr_0">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                            <!--carousel-->
                            <div class="relative qv_carousel_wrap">
                                <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_prev">
                                    <i class="fa fa-angle-left "></i>
                                </button>
                                <ul class="qv_carousel_single d_inline_middle">
                                    <a href="#" data-image="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>"><img src="./admin/<?php echo $row['product_image']; ?>" alt=""></a>
                                    <a href="#" data-image="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>"><img src="./admin/<?php echo $row['product_image']; ?>" alt=""></a>
                                    <a href="#" data-image="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>"><img src="./admin/<?php echo $row['product_image']; ?>" alt=""></a>
                                    <a href="#" data-image="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>"><img src="./admin/<?php echo $row['product_image']; ?>" alt=""></a>
                                    <a href="#" data-image="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>"><img src="./admin/<?php echo $row['product_image']; ?>" alt=""></a>
                                    <a href="#" data-image="./admin/<?php echo $row['product_image']; ?>" data-zoom-image="./admin/<?php echo $row['product_image']; ?>"><img src="./admin/<?php echo $row['product_image']; ?>" alt=""></a>
                                </ul>
                                <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_next">
                                    <i class="fa fa-angle-right "></i>
                                </button>
                            </div>
                        </div>
                        <div class="p_top_10 t_xs_align_l">
                            <!--description-->
                            <h2 class="color_dark fw_medium m_bottom_10"><?php echo $row['product_name']?></h2>
                            <div class="m_bottom_10">
                                <!--rating-->
                                <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
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
                                <a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>
                            </div>
                            <hr class="m_bottom_10 divider_type_3">
                            <table class="description_table m_bottom_10">
                                <tr>
                                    <td>Manufacturer:</td>
                                    <?php
                                    while ($brand= mysqli_fetch_assoc($pro_result)){
                                        ?>
                                    <td><a href="#" class="color_dark"><?php echo $brand['brand_name'];?></a></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td>Availability:</td>
                                    <td><span class="color_green">in stock</span> <?php echo $row['product_quantity']?> item(s)</td>
                                </tr>
                                <tr>
                                    <td>Product Code:</td>
                                    <td><?php echo $row['product_sku']?></td>
                                </tr>
                            </table>
                            <hr class="divider_type_3 m_bottom_10">
                            <p class="m_bottom_10"><?php echo $row['product_short_description']?></p>
                            <hr class="divider_type_3 m_bottom_15">
                            <div class="m_bottom_15">
                                <s class="v_align_b f_size_ex_large">BDT-<?php echo $row['product_price'];?></s><span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">BDT-<?php echo $row['product_price']?></span>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                            <table class="description_table type_2 m_bottom_15">
<!--                                <tr>-->
<!--                                    <td class="v_align_m">Size:</td>-->
<!--                                    <td class="v_align_m">-->
<!--                                        <div class="custom_select f_size_medium relative d_inline_middle">-->
<!--                                            <div class="select_title r_corners relative color_dark">s</div>-->
<!--                                            <ul class="select_list d_none"></ul>-->
<!--                                            <select name="product_name">-->
<!--                                                <option value="s">s</option>-->
<!--                                                <option value="m">m</option>-->
<!--                                                <option value="l">l</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                               </tr>-->
                                <tr>
                                    <td class="v_align_m">Quantity:</td>
                                    <td class="v_align_m">
                                        <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
                                            <button class="bg_tr d_block f_left" data-direction="down">-</button>
                                            <input type="text" name="sales_quantity" value="1" class="f_left">
                                            <input type="hidden" name="product_id" readonly value="<?php echo $row['product_id'];?>" class="f_left">
                                            <button class="bg_tr d_block f_left" data-direction="up">+</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="d_ib_offset_0 m_bottom_20">
                                <button type="submit" name="add_to_cart" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Buy Now</button>
                                <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0"><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span><i class="fa fa-heart-o f_size_big"></i></button>
                                <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0"><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span><i class="fa fa-files-o f_size_big"></i></button>
                                <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
                            </div>
                            </form>
                            <p class="d_inline_middle">Share this:</p>
                            <div class="d_inline_middle m_left_5 addthis_widget_container">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                    <a class="addthis_button_preferred_1"></a>
                                    <a class="addthis_button_preferred_2"></a>
                                    <a class="addthis_button_preferred_3"></a>
                                    <a class="addthis_button_preferred_4"></a>
                                    <a class="addthis_button_compact"></a>
                                    <a class="addthis_counter addthis_bubble_style"></a>
                                </div>
                                <!-- AddThis Button END -->
                            </div>
                        </div>
                    </div>
                    <!--tabs-->
                    <div class="tabs m_bottom_45">
                        <!--tabs navigation-->
                        <nav>
                            <ul class="tabs_nav horizontal_list clearfix">
                                <li class="f_xs_none"><a href="#tab-1" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Description</a></li>
                                <li class="f_xs_none"><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Specifications</a></li>
                                <li class="f_xs_none"><a href="#tab-3" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Reviews</a></li>
                                <li class="f_xs_none"><a href="#tab-4" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Custom Tab</a></li>
                            </ul>
                        </nav>
                        <section class="tabs_content shadow r_corners">
                            <div id="tab-1">
                                <p class="m_bottom_10"><?php echo $row['product_long_description'];?></p>
                            </div>
                            <div id="tab-2">
<!--                                <h5 class="fw_medium m_bottom_15">Item specifics:</h5>-->
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_15">
                                        <div class="table_sm_wrap">
<!--                                            <table class="description_table type_3 m_xs_bottom_10">-->
<!--                                                <tr>-->
<!--                                                    <td>Category:</td>-->
<!--                                                    --><?php
//                                                    while ($cat= mysqli_fetch_assoc($category_result)){
//                                                    ?>
<!--                                                    <td>--><?php //echo $cat['category_name'];?><!--</td>-->
<!--                                                    --><?php //}?>
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td>Manufacture:</td>-->
<!--                                                    --><?php
//                                                    while ($brands= mysqli_fetch_assoc($pro_result)){
//                                                    ?>
<!--                                                    <td>--><?php //echo $brands['brand_name'];?><!--</td>-->
<!--                                                    --><?php //}?>
<!--                                                </tr>-->
<!--                                            </table>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="clearfix">
                        <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Related Products</h2>
                        <div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">
                            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners rp_prev"><i class="fa fa-angle-left"></i></button>
                            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners rp_next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                    <?php
                    while ($related_cat = mysqli_fetch_assoc($related_result)){
                    ?>
                    <div class="col-sm-3">
                    <div class="related_projects m_bottom_15 m_sm_bottom_0 m_xs_bottom_15">

                        <figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
                            <!--product preview-->
                                <a href="#" class="d_block relative pp_wrap"><!--hot product-->
                                    <span class="hot_stripe type_2"><img src="../asset/front_end/images/hot_product_type_2.png" heignt="250px" width="200px" alt=""></span>
                                    <img src="./admin/<?php echo $related_cat['product_image'];?>" heignt="250px" width="200px" class="tr_all_hover" alt="">
                                    <span data-popup="#quick_view_product" class="t_md_align_c button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                                </a>
                            <!--description and price of product-->
                            <figcaption class="t_xs_align_l">
                                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis"><?php echo $related_cat['product_name']; ?></a></h5>
                                <div class="clearfix">
                                    <p class="scheme_color f_left f_size_large m_bottom_15"><?php echo $related_cat['product_price']; ?></p>
                                    <!--rating-->
                                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                                </div>
                                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Buy Now</button>
                            </figcaption>
                        </figure>
                    </div>
                    </div>
                    <?php } ?>
                    <hr class="divider_type_3 m_bottom_15">
                    <a href="index.php" role="button" class="d_inline_b bg_light_color_2 color_dark tr_all_hover button_type_4 r_corners"><i class="fa fa-reply m_left_5 m_right_10 f_size_large"></i>Back to: Home</a>
                </section>
                <!--right column-->
                <aside class="col-lg-3 col-md-3 col-sm-3">

                    <?php include 'category.php';?>

                    <!--compare products-->
                    <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                            <h3 class="color_light">Compare Products</h3>
                        </figcaption>
                        <div class="widget_content">
                            You have no product to compare.
                        </div>
                    </figure>
                    <!--banner-->
                    <a href="#" class="d_block r_corners m_bottom_30">
                        <img src="../asset/front_end/images/banner_img_6.jpg" alt="">
                    </a>
                    <!--Bestsellers-->
                    <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                            <h3 class="color_light">Bestsellers</h3>
                        </figcaption>
                        <div class="widget_content">
                            <div class="clearfix m_bottom_15">
                                <img src="../asset/front_end/images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
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
                                <img src="../asset/front_end/images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                <a href="#" class="color_dark d_block bt_link">Product Details</a>
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
                                <img src="../asset/front_end/images/bestsellers_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
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
                </aside>
            </div>
        </div>
    </div>