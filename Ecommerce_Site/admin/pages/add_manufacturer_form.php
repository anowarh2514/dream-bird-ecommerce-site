<?php
if(isset($_POST['menufacturer'])){
    $menufacturer_mge = $obj_admin->save_menufacturer_info($_POST,$_FILES);
}
if(isset($_GET['file'])){
    $file = $_GET['file'];
$obj_admin->saveImage($file);
}
?>
<h3>
    <?php
    if(isset($menufacturer_mge)){
        echo $menufacturer_mge;
        unset($menufacturer_mge);
    }
    ?>
</h3>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Menufacturer</h2>
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
                        <label class="control-label" for="typeahead">Brand Name </label>
                        <div class="controls">
                            <input type="text" name="brand_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Brand Description </label>
                        <div class="controls">
                            <textarea name="brand_description" class="cleditor" id="textarea2" rows="3"></textarea>
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
                        <button type="submit" name="menufacturer" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
