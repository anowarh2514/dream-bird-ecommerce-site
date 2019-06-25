<?php
//include_once('../classes/Database.php');
class Admin
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
    public function save_category_info($data=''){
        $sql = "INSERT INTO tbl_category(category_name,category_description,publication_status) VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";
        mysqli_query($this->connection,$sql);
        $message = 'Category Information Save Successfully !!!!';
        return $message;
    }
    public function save_sub_category_info($data=''){
        $sql = "INSERT INTO tbl_sub_category(category_id,category_name,category_description,publication_status) VALUES('$data[category_id]','$data[category_name]','$data[category_description]','$data[publication_status]')";
        mysqli_query($this->connection,$sql);
        $sub_message = 'Sub Category Information Save Successfully !!!!';
        return $sub_message;
    }
    public function save_menufacturer_info($data,$files){
        if($files["brand_image"]["name"]){
            $target_dir = "../product_images/";
            $target_file = $target_dir.basename($files["brand_image"]["name"]);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["brand_image"]["tmp_name"]);
            if($check !== false){
                if($files["brand_image"]["size"]<500000){
                    if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
                        $menufacturer_mge = "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
                        return $menufacturer_mge;
                    }else{
                        if(move_uploaded_file($files["brand_image"]["tmp_name"],$target_file)){
                            $brand_image = $target_file;
                            $sql = "INSERT INTO tbl_menufacturer(brand_name,brand_description,brand_image,publication_status) VALUES('$data[brand_name]','$data[brand_description]','$brand_image','$data[publication_status]')";
                            if(!mysqli_query($this->connection,$sql)){
                                $menufacturer_mge = "Sql Error".mysqli_error($this->connection);
                                return $menufacturer_mge;
                            }else{
                                $menufacturer_mge = "Menufacturer Information Save Successfully !!!";
                                return $menufacturer_mge;
                            }
                        }else{
                            $menufacturer_mge = "Sorry, there was an error uploading your file";
                            return $menufacturer_mge;
                        }
                    }
                }
                else{
                    $menufacturer_mge = "Sorry, your file is too large";
                    return $menufacturer_mge;
                }
            }else{
                $menufacturer_mge = "File is not an image";
                return $menufacturer_mge;
            }
        }
        else{
            $menufacturer_mge ='Image file not selected';
            return $menufacturer_mge;
        }
    }

    public function selectAllMenufacturer(){
        $sql = "SELECT * FROM tbl_menufacturer";
        $menufacturer_result = mysqli_query($this->connection,$sql);
        return $menufacturer_result;
    }

    public function selectAllCategory(){
        $sql = "SELECT * FROM tbl_category";
        $query_result = mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function select_All_Sub_Category(){
        $sql = "SELECT * FROM tbl_sub_category";
        $query_result = mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function publishedCategory($id){
        $sql = "UPDATE tbl_category SET publication_status = '1' WHERE category_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_category.php');
    }
    public function unpublishedCategory($id){
        $sql = "UPDATE tbl_category SET publication_status = '0' WHERE category_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_category.php');
    }
    public function deleteCategory($id){
        $sql = "DELETE FROM tbl_category WHERE category_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_category.php');
    }
    public function publishedSubCategory($id){
        $sql = "UPDATE tbl_sub_category SET publication_status = '1' WHERE sub_category_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_sub_category.php');
    }
    public function unpublishedSubCategory($id){
        $sql = "UPDATE tbl_sub_category SET publication_status = '0' WHERE sub_category_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_sub_category.php');
    }
    public function deleteSubCategory($id){
        $sql = "DELETE FROM tbl_sub_category WHERE sub_category_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_sub_category.php');
    }
    public function publishedMenufacturer($id){
        $sql = "UPDATE tbl_menufacturer SET publication_status = '1' WHERE menufacturer_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_menufacturer.php');
    }
    public function unpublishedMenufacturer($id){
        $sql = "UPDATE tbl_menufacturer SET publication_status = '0' WHERE menufacturer_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_menufacturer.php');
    }
    public function deleteMenufacturer($id){
        $sql = "DELETE FROM tbl_menufacturer WHERE menufacturer_id = '$id'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_menufacturer.php');
    }

    public function select_category_info_by_id($category_id){
        $sql= "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
        $query_result =  mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function select_sub_category_info_by_id($sub_category_id){
        $sql= "SELECT * FROM tbl_sub_category WHERE sub_category_id = '$sub_category_id'";
        $query_result =  mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function select_menufacturer_info_by_id($menufacturer_id){
        $sql= "SELECT * FROM tbl_menufacturer WHERE menufacturer_id = '$menufacturer_id'";
        $query_result =  mysqli_query($this->connection,$sql);
        return $query_result;
    }
    public function update_category_info($data){
        $sql = "UPDATE tbl_category SET category_name='$data[category_name]',category_description = '$data[category_description]',publication_status = '$data[publication_status]' WHERE category_id = '$data[category_id]'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_category.php');
    }
    public function update_sub_category_info($data){
        $sql = "UPDATE tbl_sub_category SET category_id='$data[category_id]',category_name='$data[category_name]',category_description = '$data[category_description]',publication_status = '$data[publication_status]' WHERE sub_category_id = '$data[sub_category_id]'";
        mysqli_query($this->connection,$sql);
        header('Location:manage_sub_category.php');
    }
    public function update_menufacturer_info($data,$files){
        if($files["brand_image"]["name"]){
            $target_dir = "../product_images/";
            $target_file = $target_dir.basename($files["brand_image"]["name"]);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["brand_image"]["tmp_name"]);
            if($check !== false){
                if($files["brand_image"]["size"]<500000){
                    if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
                        $menufacturer_mge = "Sorry, only JPG,JPEG,PNG & GIF files are allowed";
                        return $menufacturer_mge;
                    }else{
                        if(move_uploaded_file($files["brand_image"]["tmp_name"],$target_file)){
                            $brand_image = $target_file;
                            $sql = "UPDATE tbl_menufacturer SET brand_name='$data[brand_name]',brand_description = '$data[brand_description]',brand_image='$brand_image',publication_status = '$data[publication_status]' WHERE menufacturer_id = '$data[menufacturer_id]'";

                            if(!mysqli_query($this->connection,$sql)){
                                $menufacturer_mge = "Sql Error".mysqli_error($this->connection);
                                return $menufacturer_mge;
                            }else{
                                header('Location:manage_menufacturer.php');
                            }
                        }else{
                            $menufacturer_mge = "Sorry, there was an error uploading your file";
                            return $menufacturer_mge;
                        }
                    }
                }
                else{
                    $menufacturer_mge = "Sorry, your file is too large";
                    return $menufacturer_mge;
                }
            }else{
                $menufacturer_mge = "File is not an image";
                return $menufacturer_mge;
            }
        }
        else{
            $menufacturer_mge ='Image file not selected';
            return $menufacturer_mge;
        }

    }
    public function logout(){
        session_destroy();
        session_start();
        $_SESSION['message']='You Are Successfully Logout';
        header('Location:index.php');
    }
}