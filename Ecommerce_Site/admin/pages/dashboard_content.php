<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Dashboard</a></li>
</ul>
<div class="row-fluid">

    <a class="quick-button metro yellow span2">
        <i class="icon-group"></i>
        <p>Users</p>
        <span class="badge">237</span>
    </a>
    <a class="quick-button metro red span2">
        <i class="icon-comments-alt"></i>
        <p>Comments</p>
        <span class="badge">46</span>
    </a>

    <a class="quick-button metro blue span2">

        <i class="icon-shopping-cart"></i>
        <p>Orders</p>
        <?php
        include_once '../classes/product.php';
        $session_id=session_id();
        $obj_product = new product();
        $result=$obj_product->select_cart_product_by_session_id($session_id);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
        <span class="badge">
            <?php
             echo $row['product_sales_quantity'];
            ?>
        </span>
        <?php }?>
    </a>

    <a class="quick-button metro green span2" href="manage_product.php">
        <i class="icon-barcode"></i>
        <p>Products</p>
    </a>
    <a class="quick-button metro pink span2">
        <i class="icon-envelope"></i>
        <p>Messages</p>
        <span class="badge">88</span>
    </a>
    <a class="quick-button metro black span2" href="calender.php">
        <i class="icon-calendar"></i>
        <p>Calendar</p>
    </a>
</div><!--/row-->

</div>
