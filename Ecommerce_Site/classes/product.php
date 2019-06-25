<?php

class Product
{
    protected $connection;
    public function __construct()
    {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_dream_bird';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->connection) {

            die('Connection Fail' . mysqli_error($this->connection));
        };
    }
    public function save_product_info($data,$files){
        if($files["product_image"]["name"]){
            $target_dir = "../product_images/";
            $target_file = $target_dir.basename($files["product_image"]["name"]);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["product_image"]["tmp_name"]);
            if($check !== false){
                if($files["product_image"]["size"]<500000){
                    if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
                         $product_mge = "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
                         return $product_mge;
                    }else{
                        if(move_uploaded_file($files["product_image"]["tmp_name"],$target_file)){
                               $product_image = $target_file;
                               $sql = "INSERT INTO tbl_product (category_id, menufacturer_id, product_name, product_price, product_quantity, product_sku, product_short_description, product_long_description, product_image,product_size, publication_status) VALUES ('$data[category_id]', '$data[menufacturer_id]', '$data[product_name]','$data[product_price]','$data[product_quantity]','$data[product_sku]','$data[product_short_description]','$data[product_long_description]', '$product_image','$data[product_size]','$data[publication_status]')";
                               if(!mysqli_query($this->connection,$sql)){
                                 $product_mge = "Sql Error".mysqli_error($this->connection);
                                 return $product_mge;
                               }else{
                                   $product_mge = "Product Information Save Successfully !!!";
                                   return $product_mge;
                               }
                        }else{
                            $product_mge = "Sorry, there was an error uploading your file";
                            return $product_mge;
                        }
                    }
                }
                else{
                    $product_mge = "Sorry, your file is too large";
                    return $product_mge;
                }
            }else{
                $product_mge = "File is not an image";
                return $product_mge;
            }
        }
        else{
            $product_mge ='Image file not selected';
            return $product_mge;
        }
    }
    public function selectAllProduct(){
        $sql = "SELECT * FROM tbl_product WHERE deletion_status='0'";
        $product_result = mysqli_query($this->connection,$sql);
        return $product_result;
    }
    public function publishedProduct($id){
        $sql = "UPDATE tbl_product SET publication_status = '1' WHERE product_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_product.php');
    }
    public function unpublishedProduct($id){
        $sql = "UPDATE tbl_product SET publication_status = '0' WHERE product_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_product.php');
    }
    public function deleteProduct($id){
        $sql = "UPDATE tbl_product SET deletion_status = '1' WHERE product_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_product.php');
    }
    public function select_product_info_by_id($product_id){
        $sql= "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $query_result =  mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function update_product_info($data,$files){
        if($files["product_image"]["name"]){
            $target_dir = "../product_images/";
            $target_file = $target_dir.basename($files["product_image"]["name"]);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["product_image"]["tmp_name"]);
            if($check !== false){
                if($files["product_image"]["size"]<500000){
                    if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
                        $product_mge = "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
                        return $product_mge;
                    }else{
                        if(move_uploaded_file($files["product_image"]["tmp_name"],$target_file)){
                            $product_image = $target_file;
                            $sql = "UPDATE tbl_product SET category_id='$data[category_id]', menufacturer_id='$data[menufacturer_id]', product_name='$data[product_name]', product_price = '$data[product_price]', product_quantity = '$data[product_quantity]', product_sku = '$data[product_sku]', product_short_description = '$data[product_short_description]', product_long_description = '$data[product_long_description]', product_image = '$product_image', publication_status = '$data[publication_status]') WHERE product_id = '$data[product_id]'";
                            if(mysqli_query($this->connection,$sql)){
                                header('Location:manage_product.php');
                            }else{
                                $product_mge = "Product Information Update Unsuccessfully !!!";
                                return $product_mge;
                            }
                        }else{
                            $product_mge = "Sorry, there was an error uploading your file";
                            return $product_mge;
                        }
                    }
                }
                else{
                    $product_mge = "Sorry, your file is too large";
                    return $product_mge;
                }
            }else{
                $product_mge = "File is not an image";
                return $product_mge;
            }
        }
        else{
            $product_mge ='Image file not selected';
            return $product_mge;
        }
    }
    public function select_published_category(){
        $sql = "SELECT * FROM tbl_category WHERE publication_status = '1' ";
        $query_result = mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function select_published_sub_category(){
        $sql = "SELECT * FROM tbl_sub_category WHERE publication_status = '1' ";
        $sub_category = mysqli_query($this->connection,$sql);
        return $sub_category;
    }
    public function select_published_menufacturer(){
        $sql = "SELECT * FROM tbl_menufacturer WHERE publication_status = '1' ";
        $manu_result = mysqli_query($this->connection,$sql);
        return $manu_result;
    }
    public function select_published_product(){
        $sql = "SELECT * FROM tbl_product WHERE publication_status = '1' AND deletion_status='0'";
        $product_result = mysqli_query($this->connection,$sql);
        return $product_result;
    }
    public function select_product_details_by_category_id($category_id){
        $sql = "SELECT * FROM tbl_product AND tbl_category WHERE publication_status = '1' AND deletion_status='0' AND category_id='$category_id' JOIN tbl_category.category_id = tbl_product.category_id";
        $category_result = mysqli_query($this->connection,$sql);
        return $category_result;
    }
    public function select_published_product_by_category_id($category_id){
        $sql = "SELECT * FROM tbl_product WHERE publication_status = '1' AND deletion_status='0' AND category_id='$category_id'";
        $product_result = mysqli_query($this->connection,$sql);
        return $product_result;
    }
    public function select_published_product_by_menufacturer_id($menufacturer_id){
        $sql = "SELECT * FROM tbl_product WHERE publication_status = '1' AND deletion_status='0' AND menufacturer_id='$menufacturer_id'";
        $product_result = mysqli_query($this->connection,$sql);
        return $product_result;
    }
    public function select_product_by_id($product_id){
        $sql = "SELECT * FROM tbl_product WHERE product_id='$product_id'";
        $result=mysqli_query($this->connection,$sql);
        return $result;
    }
    public function select_menufacturer($menufacturer_id){
        $sql = "SELECT * FROM tbl_menufacturer WHERE menufacturer_id='$menufacturer_id'";
        $pro_result = mysqli_query($this->connection,$sql);
        return $pro_result;
    }
    public function select_related_product($category_id){
        $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id' limit 3";
        $related_result = mysqli_query($this->connection,$sql);
        return $related_result;
    }
    public function save_new_product_info($data,$files)
    {
        if ($files["new_product_image"]["name"]) {
            $target_dir = "../product_images/";
            $target_file = $target_dir . basename($files["new_product_image"]["name"]);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["new_product_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["new_product_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $new_product_mge = "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
                        return $new_product_mge;
                    } else {
                        if (move_uploaded_file($files["new_product_image"]["tmp_name"], $target_file)) {
                            $new_product_image = $target_file;
                            $sql = "INSERT INTO tbl_new_product (category_id, menufacturer_id,new_product_name, new_product_price, new_product_quantity, new_product_sku, new_product_short_description, new_product_long_description, new_product_image,new_product_size, publication_status) VALUES ('$data[category_id]', '$data[menufacturer_id]', '$data[new_product_name]','$data[new_product_price]','$data[new_product_quantity]','$data[new_product_sku]','$data[new_product_short_description]','$data[new_product_long_description]', '$new_product_image','$data[new_product_size]','$data[publication_status]')";
                            if (!mysqli_query($this->connection, $sql)) {
                                $new_product_mge = "Sql Error" . mysqli_error($this->connection);
                                return $new_product_mge;
                            } else {
                                $new_product_mge = "Product Information Save Successfully !!!";
                                return $new_product_mge;
                            }
                        } else {
                            $new_product_mge = "Sorry, there was an error uploading your file";
                            return $new_product_mge;
                        }
                    }
                } else {
                    $new_product_mge = "Sorry, your file is too large";
                    return $new_product_mge;
                }
            } else {
                $new_product_mge = "File is not an image";
                return $new_product_mge;
            }
        } else {
            $new_product_mge = 'Image file not selected';
            return $new_product_mge;
        }
    }
        public function selectAllNewProduct(){
            $sql = "SELECT * FROM tbl_new_product WHERE deletion_status='0'";
            $new_product_result = mysqli_query($this->connection,$sql);
            return $new_product_result;
        }
    public function selectAlllatestProduct(){
        $sql = "SELECT * FROM tbl_product WHERE deletion_status='0' LIMIT 3";
        $latest_product_result = mysqli_query($this->connection,$sql);
        return $latest_product_result;
    }
        public function publishedNewProduct($id){
            $sql = "UPDATE tbl_new_product SET publication_status = '1' WHERE new_product_id = '$id'";
            mysqli_query($this->connection,$sql);
            header('Location:manage_new_product.php');
        }
        public function unpublishedNewProduct($id){
            $sql = "UPDATE tbl_new_product SET publication_status = '0' WHERE new_product_id = '$id'";
            mysqli_query($this->connection,$sql);
            header('Location:manage_new_product.php');
        }
        public function deleteNewProduct($id){
            $sql = "UPDATE tbl_new_product SET deletion_status = '1' WHERE new_product_id = '$id'";
            mysqli_query($this->connection,$sql);
            header('Location:manage_new_product.php');
        }
        public function select_new_product_info_by_id($new_product_id){
            $sql= "SELECT * FROM tbl_new_product WHERE new_product_id = '$new_product_id'";
            $new_query_result =  mysqli_query($this->connection,$sql);
            return $new_query_result;
        }
    public function update_new_product_info($data,$files){
        if($files["new_product_image"]["name"]){
            $target_dir = "../product_images/";
            $target_file = $target_dir.basename($files["new_product_image"]["name"]);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["new_product_image"]["tmp_name"]);
            if($check !== false){
                if($files["new_product_image"]["size"]<500000){
                    if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
                        $new_product_mge = "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
                        return $new_product_mge;
                    }else{
                        if(move_uploaded_file($files["new_product_image"]["tmp_name"],$target_file)){
                            $new_product_image = $target_file;
                            $sql = "UPDATE tbl_new_product SET category_id='$data[category_id]', menufacturer_id='$data[menufacturer_id]', new_product_name='$data[new_product_name]', new_product_price = '$data[new_product_price]', new_product_quantity = '$data[new_product_quantity]', new_product_sku = '$data[new_product_sku]', new_product_short_description = '$data[new_product_short_description]', new_product_long_description = '$data[new_product_long_description]', new_product_image = '$new_product_image', publication_status = '$data[publication_status]') WHERE new_product_id = '$data[new_product_id]'";
                            if(mysqli_query($this->connection,$sql)){
                                header('Location:manage_new_product.php');
                            }else{
                                $new_product_mge = "Product Information Update Unsuccessfully !!!";
                                return $new_product_mge;
                            }
                        }else{
                            $new_product_mge = "Sorry, there was an error uploading your file";
                            return $new_product_mge;
                        }
                    }
                }
                else{
                    $new_product_mge = "Sorry, your file is too large";
                    return $new_product_mge;
                }
            }else{
                $new_product_mge = "File is not an image";
                return $new_product_mge;
            }
        }
        else{
            $new_product_mge ='Image file not selected';
            return $new_product_mge;
        }
    }
    public function select_cart_product_by_session_id($session_id){
        $sql = "SELECT * FROM tbl_cart_temp WHERE session_id = '$session_id'";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
    public function select_category_wise_product($category_id){
        $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id'";
        $category_product_result = mysqli_query($this->connection,$sql);
       return $category_product_result;
    }
}