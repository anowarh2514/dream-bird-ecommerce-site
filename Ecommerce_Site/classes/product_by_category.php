<?php

class Product_by_Category
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

    public function select_category_wise_product($category_id){
        $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id'";
        $category_product_result = mysqli_query($this->connection,$sql);
        return $category_product_result;
    }
}