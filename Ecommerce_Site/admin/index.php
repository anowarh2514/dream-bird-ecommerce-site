<?php
//session_start();
$message='';
include_once('../classes/Login.php');
$obj_login = new Login();
if(isset($_POST['btn'])) {
    $message = $obj_login->admin_login_check($_POST);
}
if(isset($_SESSION['admin_id'])){
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Log In: Dream Bird</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="../asset/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="../asset/admin/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="../asset/admin/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="../asset/admin/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="../asset/admin/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="../asset/admin/img/favicon.ico">
    <!-- end: Favicon -->

    <style type="text/css">
        body { background: url(../asset/admin/img/bg-login.jpg) !important; }
    </style>



</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="dashboard.php"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>
                <h2 style="color: red">
                    <?php
                     if($message){
                         echo $message;
                         unset($message);
                     }
                    ?>
                </h2>
                <h2 style="color: green">
                    <?php
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </h2>
                 <h2 style="color: #398439"><b>LogIn To Your Account</b></h2>
                <form class="form-horizontal" action="" method="post">
                    <fieldset>

                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="admin_email_address" id="username" type="text" placeholder="Enter your email or username"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="admin_password" id="password" type="password" placeholder="Enter your password"/>
                        </div>
                        <div class="clearfix"></div>

                        <label class="remember" for="remember" style="color: #398439"><input type="checkbox" id="remember" />Remember me</label>

                        <div class="button-login">
                            <button type="submit" class="btn btn-success" name="btn">Login</button>
                        </div>
                        <div class="clearfix"></div>
                </form>
                <hr>
                <h3 style="color:red"><b>Forgot Password?</b></h3>
                <p>
                    <b>No problem, <a href="#" style="color: #398439">click here<b></a> to get a new password.
                </p>
            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->

<!-- start: JavaScript-->

<script src="../asset/admin/js/jquery-1.9.1.min.js"></script>
<script src="../asset/admin/js/jquery-migrate-1.0.0.min.js"></script>

<script src="../asset/admin/js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="../asset/admin/js/jquery.ui.touch-punch.js"></script>

<script src="../asset/admin/js/modernizr.js"></script>

<script src="../asset/admin/js/bootstrap.min.js"></script>

<script src="../asset/admin/js/jquery.cookie.js"></script>

<script src='../asset/admin/js/fullcalendar.min.js'></script>

<script src='../asset/admin/js/jquery.dataTables.min.js'></script>

<script src="../asset/admin/js/excanvas.js"></script>
<script src="../asset/admin/js/jquery.flot.js"></script>
<script src="../asset/admin/js/jquery.flot.pie.js"></script>
<script src="../asset/admin/js/jquery.flot.stack.js"></script>
<script src="../asset/admin/js/jquery.flot.resize.min.js"></script>

<script src="../asset/admin/js/jquery.chosen.min.js"></script>

<script src="../asset/admin/js/jquery.uniform.min.js"></script>

<script src="../asset/admin/js/jquery.cleditor.min.js"></script>

<script src="../asset/admin/js/jquery.noty.js"></script>

<script src="../asset/admin/js/jquery.elfinder.min.js"></script>

<script src="../asset/admin/js/jquery.raty.min.js"></script>

<script src="../asset/admin/js/jquery.iphone.toggle.js"></script>

<script src="../asset/admin/js/jquery.uploadify-3.1.min.js"></script>

<script src="../asset/admin/js/jquery.gritter.min.js"></script>

<script src="../asset/admin/js/jquery.imagesloaded.js"></script>

<script src="../asset/admin/js/jquery.masonry.min.js"></script>

<script src="../asset/admin/js/jquery.knob.modified.js"></script>

<script src="../asset/admin/js/jquery.sparkline.min.js"></script>

<script src="../asset/admin/js/counter.js"></script>

<script src="../asset/admin/js/retina.js"></script>

<script src="../asset/admin/js/custom.js"></script>
<!-- end: JavaScript-->

</body>
</html>
