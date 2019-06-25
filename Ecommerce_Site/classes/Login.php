<?php
//require_once('../classes/Database.php');

class Login
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
        session_start();
    }
    public function admin_login_check($data){
        $password = md5($data['admin_password']);
        $sql = "SELECT * FROM tbl_admin WHERE admin_email_address='$data[admin_email_address]' AND admin_password = '$password'";
        if ($query_result=mysqli_query($this->connection, $sql)) {
            $result= mysqli_fetch_assoc($query_result);
            if($result) {
                $_SESSION['admin_id'] = $result['admin_id'];
                $_SESSION['admin_name'] = $result['admin_name'];
                $this->get_session('true');
                header('Location:dashboard.php');
            }else{

                $message ='Your Email Or Password is Invalid !!!!';
                return $message;
               // header('Location:index.php');
            }
        } else {
            die('Query problem' . mysqli_error($this->connection));

        }
    }
    public function get_session($gstatus=NULL){
        if($_SESSION['login_status'] == $gstatus) {
            return true;
        }
        else
        {
            return false;
        }
    }
}