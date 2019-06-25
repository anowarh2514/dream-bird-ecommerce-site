<?php
$category_result = $obj_product->select_published_category();
$menufacturar_result = $obj_product->select_published_menufacturer();
if(isset($_POST['new_product'])){
    $new_product_mge = $obj_product->save_new_product_info($_POST,$_FILES);
}
?>
<h3>
    <?php
    if(isset($new_product_mge)){
        echo $new_product_mge;
        unset($new_product_mge);
    }
    ?>
</h3>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Product Collection</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <select name="category_id">
                                <option>------------Select Status-----------</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($category_result)){
                                ?>
                                <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
                               <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Brand Name </label>
                        <div class="controls">
                            <select name="menufacturer_id">
                                <option>------------Select Status-----------</option>
                                <?php
                                while ($result = mysqli_fetch_assoc($menufacturar_result)){
                                    ?>
                                    <option value="<?php echo $result['menufacturer_id'];?>"><?php echo $result['brand_name'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name </label>
                        <div class="controls">
                            <input type="text" name="new_product_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price </label>
                        <div class="controls">
                            <input type="number" name="new_product_price" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Quantity </label>
                        <div class="controls">
                            <input type="number" name="new_product_quantity" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Code </label>
                        <div class="controls">
                            <input type="text" name="new_product_sku" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Short Description </label>
                        <div class="controls">
                            <textarea name="new_product_short_description" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Long Description </label>
                        <div class="controls">
                            <textarea name="new_product_long_description" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <form action="" method="post" enctype="multipart/form-data">
                        <label class="control-label" for="typeahead">Product Image </label>
                        <div class="controls">
                            <input type="file" name="new_product_image" id="fileToUpload">
                        </div>
                        </form>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Size </label>
                        <div class="controls">
                            <input type="text" name="new_product_size" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status </label>
                        <div class="controls">
                            <select name="publication_status">
                                <option>------------Select Status-----------</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="new_product" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
