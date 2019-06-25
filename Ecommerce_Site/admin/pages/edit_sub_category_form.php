<?php
$result = $obj_admin->select_sub_category_info_by_id($sub_category_id);
$category_info = mysqli_fetch_assoc($result);
if(isset($_POST['update'])){
    $obj_admin->update_sub_category_info($_POST);
}
?>
<h3>
    <?php
//    if(isset($message)){
//        echo $message;
//        unset($message);
//    }
    ?>
</h3>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" name="edit_sub_category" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Sub Category Name </label>
                        <div class="controls">
                            <input type="text" name="category_name" value="<?php echo $category_info['category_name'];?>" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            <input type="hidden" name="sub_category_id" value="<?php echo $category_info['sub_category_id'];?>">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Sub Category Description </label>
                        <div class="controls">
                            <textarea name="category_description" class="cleditor" id="textarea2" rows="3" ><?php echo $category_info['category_description'];?></textarea>
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
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
<script type="text/javascript">
    document.forms['edit_sub_category'].elements['publication_status'].value='<?php echo $category_info['publication_status']?>';
    </script>