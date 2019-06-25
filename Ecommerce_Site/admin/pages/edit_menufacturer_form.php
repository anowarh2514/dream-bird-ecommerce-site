<?php
$result = $obj_admin->select_menufacturer_info_by_id($menufacturer_id);
$menufacturer_info = mysqli_fetch_assoc($result);
if(isset($_POST['update'])){
    $obj_admin->update_menufacturer_info($_POST,$_FILES);
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Menfacturer</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" name="edit_menufacturer" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Menufacturer Name </label>
                        <div class="controls">
                            <input type="text" name="brand_name" value="<?php echo $menufacturer_info['brand_name'];?>" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            <input type="hidden" name="menufacturer_id" value="<?php echo $menufacturer_info['menufacturer_id'];?>">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Brand Description </label>
                        <div class="controls">
                            <textarea name="brand_description" class="cleditor" id="textarea2" rows="3" ><?php echo $menufacturer_info['brand_description'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label class="control-label" for="typeahead">Brand Image </label>
                            <div class="controls">
                                <input type="file" name="brand_image" id="fileToUpload">
                            </div>
                        </form>
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
    document.forms['edit_menufacturer'].elements['publication_status'].value='<?php echo $menufacturer_info['publication_status']?>';
    </script>