<!DOCTYPE html>
<html>
 <head>
<?php //p($this->session->userdata());?>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="<?php echo base_url('assests/DataTables/css/jquery.dataTables.min.css')?>" rel="stylesheet">
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/DataTables/css/bootstrap-tagsinput.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/dist/css/app.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/dist/css/style.css">
  
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap-daterangepicker/daterangepicker.css">-->
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
  <script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  <script src="<?php echo base_url(); ?>assests/DataTables/js/bootstrap-tagsinput.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>   

 <style>
   .user-panel .image img{
    width: 50px;
    height: 50px;
    object-fit: contain;
    background: #fff;
   }
 </style>
</head>
  
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" style="height: auto; min-height: 100%;">

    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo base_url('HomeDashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
       
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>Store</span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url('assests/DataTables/images/gohan.jpg'); ?>" class="img-circle" alt="">
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url('assests/theme/dist/img/user1-128x128.jpg'); ?>" class="img-circle" alt="">
                        </div>
                        <h4>
                          AdminLTE Design Team
                          <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url('assests/theme/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Developers
                          <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url('assests/theme/dist/img/user3-128x128.jpg'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Sales Department
                          <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url('assests/theme/dist/img/user4-128x128.jpg'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Reviewers
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assests/DataTables/images/<?php echo $_SESSION['image']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assests/DataTables/images/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('name'); ?> - Web Developer
                    <small>Member since Aug. 2019</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-6 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('Admin_profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url("Authenticate/logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>

      </nav>
    </header>

    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url(); ?>assests/DataTables/images/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata('name'); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
         <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          
          <li class="treeview <?php echo ($this->uri->segment(1) == 'HomeDashboard') ? 'menu-open active' : '' ?>">
            <a href="<?php echo base_url('HomeDashboard'); ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->router->fetch_method() == 'index') ? 'active' : '' ?>"><a href="<?php echo base_url('HomeDashboard'); ?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            </ul>
          </li>

        <li class="treeview <?php echo ($this->uri->segment(1) == 'categories') ? 'menu-open active' : '' ?>">
          
            <a href="<?php echo base_url('Categories'); ?>">
              <i class="fa fa-list-alt"></i> <span>Categories</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
              <ul class="treeview-menu">
                <?php 
                  $categories = getCatergoryList();
                  if(!empty($categories))  
                  {
                     foreach ($categories as $ind => $cat) { 
                  ?>
                     <li class="<?php echo ($this->router->fetch_method() == 'allcategory'&& $cat->cat_id == $this->uri->segment(3)) ? 'active' : '' ?>">

                     <a href="<?php echo base_url("categories/allcategory/".$cat->cat_id); ?>"><i style="font-size:15px;" class="<?php echo $cat->icon; ?>"></i><?php echo $cat->cat_title; ?></a></li>
                    
                  <?php 
                    }
                  }
                ?>

              </ul>
          </li>

          <li class="treeview <?php echo ($this->uri->segment(1) == 'products') ? 'menu-open active' : '' ?>">
            <a href="<?php echo base_url('products'); ?>">
              <i class="fa fa-product-hunt"></i> <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->router->fetch_method() == 'addproduct') ? 'active' : '' ?>" name="add" value="add"><a href="<?php echo base_url('products/addproduct');?>"><i class="fa fa-circle-o"></i>Add Products</a></li>
              <li class="<?php echo ($this->router->fetch_method() == '') ? 'active' : '' ?>" name="all"><a href="<?php echo base_url('products/'); ?>"><i class="fa fa-circle-o"></i>All products</a></li>
            </ul>
          </li>

          <li class="treeview <?php echo ($this->uri->segment(1) == 'UserController') ? 'menu-open active' : '' ?>">
            <a href="<?php echo base_url('UserController'); ?>">
              <i class="fa fa-user"></i><span>User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->router->fetch_method() == 'adduser') ? 'active' : '' ?>"><a href="<?php echo base_url('UserController/adduser'); ?>"><i class="fa fa-circle-o"></i>Add Users</a></li>
              <li class="<?php echo ($this->router->fetch_method() == '') ? 'active' : '' ?>"><a href="<?php echo base_url('UserController/'); ?>"><i class="fa fa-circle-o"></i>All User List</a></li>
            </ul>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper" style="min-height: 926px;">
         
         <?php echo $body; ?>
    </div>

 </div>
     
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script>
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
  <!--   <script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- Morris.js charts -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>assests/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/moment/min/moment.min.js"></script>
    <!--<script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>assests/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assests/theme/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assests/theme/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assests/theme/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assests/theme/dist/js/demo.js"></script>
   
    <script src="<?php echo base_url('assests/DataTables/js/jquery.dataTables.min.js')?>"></script>

    <script src="<?php echo base_url('assests/DataTables/js/datatable_maual.js')?>"></script>
     <script src="<?php echo base_url('assests/DataTables/js/cat_status_update.js')?>"></script>
      <script src="<?php echo base_url('assests/DataTables/js/sub_category.js')?>"></script>
      <script src="<?php echo base_url('assests/DataTables/js/user_datatables.js')?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>
      
      
 </body>
</html>




