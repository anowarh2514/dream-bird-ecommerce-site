<figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
    <figcaption>
        <h3 class="color_light">Categories</h3>
    </figcaption>
    <div class="widget_content">
        <!--Categories list-->
        <ul class="categories_list">
            <?php
            while ($row = mysqli_fetch_assoc($query_result)){
                ?>
                <li>
                    <a href="?option=category&category_id=<?php echo $row['category_id'];?>" class="f_size_large scheme_color d_block relative">
                        <b><?php echo $row['category_name'];?></b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</figure>
