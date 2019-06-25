<div class="row clearfix">
    <aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
        <!--widgets-->
        <?php include 'category.php';?>
        <!--Bestsellers-->
        <figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
            <figcaption>
                <h3 class="color_light">Recent Products</h3>
            </figcaption>
            <div class="widget_content">
                <?php
                while($rows = mysqli_fetch_assoc($latest_product_result)) {
                ?>
                <div class="clearfix m_bottom_15">
                    <img src="./admin/<?php echo $rows['product_image']; ?>" height="100px" width="90px" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                    <a href="#" class="color_dark d_block bt_link"><?php echo $rows['product_name']; ?></a>
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
                    <p class="scheme_color">BDT-<?php echo $rows['product_price']; ?></p>
                </div>
                <hr class="m_bottom_15">
                <?php }?>
            </div>
        </figure>
        <!--tags-->
    </aside>
    <section class="col-lg-9 col-md-9 col-sm-9">
        <h2 class="tt_uppercase color_dark m_bottom_10 heading5 animate_ftr">Featured products</h2>
        <!--products-->
        <section class="products_container a_type_2 category_grid clearfix m_bottom_25">
            <!--product item-->
            <?php
            while($row = mysqli_fetch_assoc($product_result)) {
                ?>
                <div class="product_item hit w_xs_full">
                    <figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
                        <!--product preview-->
                        <a href="#" class="d_block relative pp_wrap m_bottom_15">
                            <!--hot product-->
                            <span class="hot_stripe"><img src="./asset/front_end/images/hot_product.png"
                                                          alt=""></span>
                            <img src="./admin/<?php echo $row['product_image']; ?>" height="250px" width="200px" class="tr_all_hover"  alt="">
                            <span role="button" data-popup="#quick_view_product"
                                  class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                        </a>
                        <!--description and price of product-->
                        <figcaption>
                            <h5 class="m_bottom_10"><a href="#"
                                                       class="color_dark"><?php echo $row['product_name']; ?></a>
                            </h5>
                            <!--rating-->
                            <ul class="horizontal_list d_inline_b m_bottom_10 clearfix rating_list type_2 tr_all_hover">
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
                            <p class="scheme_color f_size_large m_bottom_15">
                                BDT-<?php echo $row['product_price']; ?></p>
                            <a href="product_dtls.php?id=<?php echo $row['product_id'];?>" class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">
                                Buy Now
                            </a>
                            <br><br>
                            <div class="clearfix m_bottom_5">
                                <ul class="horizontal_list d_inline_b l_width_divider">
                                    <li class="m_right_15 f_md_none m_md_right_0">
                                        <a href="product_dtls.php?id=<?php echo $row['product_id'];?>" class="color_dark">Product Details</a></li>
                                    <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a>
                                    </li>
                                </ul>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            <?php } ?>
        </section>
        <!--banners-->
        <div class="row clearfix m_bottom_45">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
										<span class="d_inline_middle">
											<img class="d_inline_middle m_md_bottom_5" src="./asset/front_end/images/banner_img_3.png" alt="">
											<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
												<b>100% Satisfaction</b><br><span class="color_dark">Guaranteed</span>
											</span>
										</span>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
										<span class="d_inline_middle">
											<img class="d_inline_middle m_md_bottom_5" src="./asset/front_end/images/banner_img_4.png" alt="">
											<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
												<b>Free<br class="d_none d_sm_block"> Shipping</b><br><span class="color_dark">On All Items</span>
											</span>
										</span>
                </a>
            </div>
        </div>
        <div class="clearfix">
            <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none heading5 animate_ftr">New Collection</h2>
            <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none m_mxs_bottom_5">
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners nc_prev"><i class="fa fa-angle-left"></i></button>
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners nc_next"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        <!--bestsellers carousel-->
        <section class="products_container a_type_2 category_grid clearfix m_bottom_25">
            <!--product item-->
            <?php
            while($new = mysqli_fetch_assoc($new_product)) {
                ?>
                <div class="product_item hit w_xs_full">
                    <figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
                        <!--product preview-->
                        <a href="#" class="d_block relative pp_wrap m_bottom_15">
                            <!--hot product-->
                            <span class="hot_stripe"><img src="./asset/front_end/images/sale_product.png"
                                                          alt=""></span>
                            <img src="./admin/<?php echo $new['new_product_image']; ?>" height="250px" width="200px" class="tr_all_hover"  alt="">
                            <span role="button" data-popup="#quick_view_product"
                                  class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                        </a>
                        <!--description and price of product-->
                        <figcaption>
                            <h5 class="m_bottom_10"><a href="#"
                                                       class="color_dark"><?php echo $new['new_product_name']; ?></a>
                            </h5>
                            <!--rating-->
                            <ul class="horizontal_list d_inline_b m_bottom_10 clearfix rating_list type_2 tr_all_hover">
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
                            <p class="scheme_color f_size_large m_bottom_15">
                                BDT-<?php echo $new['new_product_price']; ?></p>
                            <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">
                                Buy Now
                            </button>
                            <div class="clearfix m_bottom_5">
                                <ul class="horizontal_list d_inline_b l_width_divider">
                                    <li class="m_right_15 f_md_none m_md_right_0">
                                        <a href="product_dtls.php?id=<?php echo $new['new_product_id'];?>" class="color_dark">Product Details</a></li>
                                    <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a>
                                    </li>
                                </ul>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            <?php } ?>
        </section>
        <!--product brands-->
        <div class="clearfix m_bottom_25 m_sm_bottom_20">
            <h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">Product Brands</h2>
            <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        <!--product brands carousel-->
        <div class="product_brands with_sidebar m_sm_bottom_35">
            <?php
            while($row = mysqli_fetch_assoc($manu_result)){
                ?>
                <a href="?option=menufacturer&menufacturer_id=<?php echo $row['menufacturer_id'];?>" class="d_block t_align_c animate_fade">
                    <img src="./product_images/<?php echo $row['brand_image'];?>" height="150px" width="200px">
                </a>
            <?php } ?>
        </div>
    </section>
</div>