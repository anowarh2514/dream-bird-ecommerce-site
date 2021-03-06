<?php
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES['image_upload']['name']);
$uploadOK = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['product'])){
    $check = getimagesize($_FILES['image_upload']['tmp_name']);
    if($check !== false){
        echo "File is an image-".$check['mime'].'';
        $uploadOK = 1;
    }else{
        echo "File is not an image";
        $uploadOK = 0;
    }
}
if(file_exists($target_file)){
    echo "Sorry, file already exists";
    $uploadOK = 0;
}
if($_FILES['image_upload']['size']>500000){
    echo "Sorry,file is too large";
    $uploadOK = 0;
}
if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
    echo "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
    $uploadOK = 0;
}
if($uploadOK == 0){
    echo "Sorry your file was not uploaded";
}else{
    if(move_uploaded_file($_FILES["image_upload"]["tmp_name"],$target_file)){
        echo "The file ".basename($_FILES["image_upload"]["name"])."has been uploaded";
    }else{
        echo "Sorry, there was an error uploading your file";
    }
}
?>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image_upload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
