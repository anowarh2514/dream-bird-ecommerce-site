<?php
session_start();
class Cart
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
    public function add_to_cart($data){
     $product_id = $data['product_id'];
     $sql = "SELECT *FROM tbl_product WHERE product_id='$product_id'";
     $result =  mysqli_query($this->connection,$sql);
     $product_info = mysqli_fetch_assoc($result);
     $session_id= session_id();
     $product_sales_quantity = $data['sales_quantity'];

     $sql="SELECT * FROM tbl_cart_temp WHERE session_id='$session_id' AND product_id='$product_id'";
     $result = mysqli_query($this->connection,$sql);
     $pro_info = mysqli_fetch_assoc($result);
     if($pro_info){
         header('Location:cart.php');
     }else {
         $sql = "INSERT INTO tbl_cart_temp (session_id, product_image, product_id, product_name, product_price, product_sales_quantity) VALUES ('$session_id','$product_info[product_image]','$data[product_id]','$product_info[product_name]','$product_info[product_price]','$product_sales_quantity')";
         mysqli_query($this->connection, $sql);
         header('Location:cart.php');
     }
    }
    public function select_cart_product_by_session_id($session_id){
        $sql = "SELECT * FROM tbl_cart_temp WHERE session_id = '$session_id'";
       $result = mysqli_query($this->connection,$sql);
       return $result;
    }
    public function add_to_cart_home($product_id){

    }
    public function update_cart_product($data){
        $session_id = session_id();
        $sql="UPDATE tbl_cart_temp SET product_sales_quantity ='$data[product_sales_quantity]' WHERE product_id = '$data[product_id]' AND session_id = '$session_id'";
        mysqli_query($this->connection,$sql);
        header('Location:cart.php');
    }
    public function remove_cart_product($cart_id){
        $sql="DELETE FROM tbl_cart_temp WHERE cart_id='$cart_id'";
        mysqli_query($this->connection,$sql);
        header('Location:cart.php');
    }
}