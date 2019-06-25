<!--content-->
<div class="row clearfix">
    <aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
        <?php include 'category.php';?>
    </aside>

        <div class="page_content_offset">
    <div class="container">
        <h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">All Products</h2>
        <!--products-->
        <section class="products_container clearfix m_bottom_25 m_sm_bottom_15">
            <!--product item-->
            <?php
            include './main_content.php';
            ?>
        </section>
        <div class="product_brands with_sidebar m_sm_bottom_35">
            <?php
            while($row = mysqli_fetch_assoc($manu_result)){
                ?>
                <a href="?option=menufacturer&menufacturer_id=<?php echo $row['menufacturer_id'];?>" class="d_block t_align_c animate_fade">
                    <img src="./product_images/<?php echo $row['brand_image'];?>" height="150px" width="200px">
                </a>
            <?php } ?>
        </div>

    </div>
</div>
</div>