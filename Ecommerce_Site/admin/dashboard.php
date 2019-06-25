<?php
ob_start();
include_once('../classes/Admin.php');
$obj_admin = new Admin();
session_start();
if($_SESSION['admin_id']==NULL){
    header('Location: index.php');
}
if(isset($_GET['l_id'])){
    if($_GET['l_id']=='logout') {
        $obj_admin->logout();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Dashboard | Dream Bird</title>
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

    <!-- Delete category item by script -->
    <script type="text/javascript">
    function check_delete() {
        var chk = confirm('Are You Sure To Delete It ???');
        if(chk){
            return true;
        }
        else {
            return false;
        }
    }
    </script>



</head>

<body>
<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="dashboard.php"><span>Dream Bird</span></a>

            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <li class="dropdown hidden-phone">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white warning-sign"></i>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li class="dropdown-menu-title">
                                <span>You have 11 notifications</span>
                                <a href="#refresh"><i class="icon-repeat"></i></a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon blue"><i class="icon-user"></i></span>
                                    <span class="message">New user registration</span>
                                    <span class="time">1 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon green"><i class="icon-comment-alt"></i></span>
                                    <span class="message">New comment</span>
                                    <span class="time">7 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon green"><i class="icon-comment-alt"></i></span>
                                    <span class="message">New comment</span>
                                    <span class="time">8 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon green"><i class="icon-comment-alt"></i></span>
                                    <span class="message">New comment</span>
                                    <span class="time">16 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon blue"><i class="icon-user"></i></span>
                                    <span class="message">New user registration</span>
                                    <span class="time">36 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon yellow"><i class="icon-shopping-cart"></i></span>
                                    <span class="message">2 items sold</span>
                                    <span class="time">1 hour</span>
                                </a>
                            </li>
                            <li class="warning">
                                <a href="#">
                                    <span class="icon red"><i class="icon-user"></i></span>
                                    <span class="message">User deleted account</span>
                                    <span class="time">2 hour</span>
                                </a>
                            </li>
                            <li class="warning">
                                <a href="#">
                                    <span class="icon red"><i class="icon-shopping-cart"></i></span>
                                    <span class="message">New comment</span>
                                    <span class="time">6 hour</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon green"><i class="icon-comment-alt"></i></span>
                                    <span class="message">New comment</span>
                                    <span class="time">yesterday</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon blue"><i class="icon-user"></i></span>
                                    <span class="message">New user registration</span>
                                    <span class="time">yesterday</span>
                                </a>
                            </li>
                            <li class="dropdown-menu-sub-footer">
                                <a>View all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- start: Notifications Dropdown -->
                    <li class="dropdown hidden-phone">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white tasks"></i>
                        </a>
                        <ul class="dropdown-menu tasks">
                            <li class="dropdown-menu-title">
                                <span>You have 17 tasks in progress</span>
                                <a href="#refresh"><i class="icon-repeat"></i></a>
                            </li>
                            <li>
                                <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                    <div class="taskProgress progressSlim red">80</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                    <div class="taskProgress progressSlim green">47</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                    <div class="taskProgress progressSlim yellow">32</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                    <div class="taskProgress progressSlim greenLight">63</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                    <div class="taskProgress progressSlim orange">80</div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-menu-sub-footer">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- end: Notifications Dropdown -->
                    <!-- start: Message Dropdown -->
                    <li class="dropdown hidden-phone">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white envelope"></i>
                        </a>
                        <ul class="dropdown-menu messages">
                            <li class="dropdown-menu-title">
                                <span>You have 9 messages</span>
                                <a href="#refresh"><i class="icon-repeat"></i></a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="avatar"><img src="../asset/admin/img/avatar.jpg" alt="Avatar"></span>
                                    <span class="header">
											<span class="from">
		 								    	<?php echo $_SESSION['admin_name']?>
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                    <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="avatar"><img src="../asset/admin/img/avatar.jpg" alt="Avatar"></span>
                                    <span class="header">
											<span class="from">
										    	<?php echo $_SESSION['admin_name']?>
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                    <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="avatar"><img src="../asset/admin/img/avatar.jpg" alt="Avatar"></span>
                                    <span class="header">
											<span class="from">
										    	<?php echo $_SESSION['admin_name']?>
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                    <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="avatar"><img src="../asset/admin/img/avatar.jpg" alt="Avatar"></span>
                                    <span class="header">
											<span class="from">
										    	<?php echo $_SESSION['admin_name']?>
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                    <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="avatar"><img src="../asset/admin/img/avatar.jpg" alt="Avatar"></span>
                                    <span class="header">
											<span class="from">
										    	<?php echo $_SESSION['admin_name']?>
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                    <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-menu-sub-footer">View all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- end: Message Dropdown -->
                    <li>
                        <a class="btn" href="#">
                            <i class="halflings-icon white wrench"></i>
                        </a>
                    </li>
                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> <?php echo $_SESSION['admin_name']?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                <span>Account Settings</span>
                            </li>
                            <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="?l_id=logout"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="dashboard.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                    <li><a href="add_manufacturer.php"><i class="icon-eye-open"></i><span class="hidden-tablet">Add Menufacturer</span></a></li>
                    <li><a href="manage_menufacturer.php"><i class="icon-dashboard"></i><span class="hidden-tablet">Manage Manufacturer</span></a></li>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Product Category</span><span class="label label-important">New</span></a>
                        <ul>
                            <li><a href="add_catagory.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Catagory</span></a></li>
                            <li><a href="manage_category.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Category</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Products</span><span class="label label-important">New Products</span></a>
                        <ul>
                            <li><a href="add_product.php"><i class="icon-edit"></i><span class="hidden-tablet">Add Product</span></a></li>
                            <li><a href="manage_product.php"><i class="icon-list-alt"></i><span class="hidden-tablet">Manage Product</span></a></li>
                            <li><a href="add_new_product.php"><i class="icon-envelope"></i><span class="hidden-tablet">Add New Collection</span></a></li>
                            <li><a href="manage_new_product.php"><i class="icon-tasks"></i><span class="hidden-tablet">Manage New Product</span></a></li>
                        </ul>
                    </li>
                    <li><a href="advertise.php"><i class="icon-share"></i><span class="hidden-tablet">Advertise</span></a></li>
                    <li><a href="manage_add.php"><i class="icon-picture"></i><span class="hidden-tablet">Manage Advertise</span></a></li>
                    <li><a href="all_orders.php"><i class="icon-file-alt"></i><span class="hidden-tablet">All Orders</span></a></li>
                    <li><a href="messages.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Messages</span></a></li>
                    <li><a href="shop_info.php"><i class="icon-road"></i><span class="hidden-tablet">Shop Info</span></a></li>
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-facebook-sign"></i><span class="hidden-tablet">Social Link</span><span class="label label-important">New</span></a>
                        <ul>
                            <li><a href="add_social_link.php"><i class="icon-twitter"></i><span class="hidden-tablet">Add Social Link</span></a></li>
                            <li><a href="manage_social_link.php"><i class="icon-google-plus-sign"></i><span class="hidden-tablet">Manage Social Link</span></a></li>
                        </ul>
                    </li>
                    <li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>
        <!-- start: Content -->
        <div id="content" class="span10">

     <?php
          if(isset($page)) {
              if ($page == NULL) {
                  include './pages/dashboard_content.php';
              }
              if ($page == 'add_catagory_form.php') {
                  include './pages/add_catagory_form.php';
              }
              if ($page == 'add_sub_catagory_form.php') {
                  include './pages/add_sub_catagory_form.php';
              }
              if ($page == 'manage_category_info.php') {
                  include './pages/manage_category_info.php';
              }
              if ($page == 'manage_sub_category_info.php') {
                  include './pages/manage_sub_category_info.php';
              }
              if ($page == 'edit_category_form.php') {
                  include './pages/edit_category_form.php';
              }
              if ($page == 'edit_sub_category_form.php') {
                  include './pages/edit_sub_category_form.php';
              }
              if ($page == 'add_manufacturer_form.php') {
                  include './pages/add_manufacturer_form.php';
              }
              if ($page == 'manage_menufacturer_info.php') {
                  include './pages/manage_menufacturer_info.php';

              }
              if ($page == 'edit_menufacturer_form.php') {
                  include './pages/edit_menufacturer_form.php';
              }
              if($page == 'add_product_form.php'){
                  include './pages/add_product_form.php';
              }
              if ($page == 'manage_product_info.php') {
                  include './pages/manage_product_info.php';

              }
              if ($page == 'edit_product_form.php') {
                  include './pages/edit_product_form.php';
              }
              if($page == 'add_new_product_form.php'){
                  include './pages/add_new_product_form.php';
              }
              if ($page == 'manage_new_product_info.php') {
                  include './pages/manage_new_product_info.php';

              }
              if ($page == 'edit_new_product_form.php') {
                  include './pages/edit_new_product_form.php';
              }
              if ($page == 'advertise_form.php') {
                  include './pages/advertise_form.php';
              }
              if ($page == 'manage_advertise.php') {
                  include './pages/manage_advertise.php';
              }
              if ($page == 'calender_form.php') {
                  include './pages/calender_form.php';
              }
          }
          else{
              include './pages/dashboard_content.php';
          }
     ?>

        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2018 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Md.Anowar Hossain</a></span>

    </p>

</footer>

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