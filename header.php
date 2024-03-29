<?php
//check login
include("session.php");
?>


<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project Tracking System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.css">

  <link rel="stylesheet" href="css/skin-me.css">

  <!-- JS -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
  <script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <script src="js/bootstrap.datetime.js"></script>
  <script src="js/bootstrap.password.js"></script>
  <script src="js/scripts.js"></script>

  <!-- AdminLTE App -->
  <script src="js/app.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.datetimepicker.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
  <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!--Logo -->
      <a href="dashboard.php" class="logo">
        <!--mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>TS</span>
        <!--logo for regular state and mobile devices -->
        <span style="text-decoration:none;" class="logo-lg"><b>ระบบติดตามโครงการ</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <!-- <img src="" class="user-image" alt="User Image"> -->
                <i class="fa-solid fa-user"></i>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['login_username']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- Drop down list-->
                <li>
                  <a href="logout.php" class="btn btn-default btn-flat" id="action_logout_2">
                    <i class="fa fa-sign-out"></i> ออกจากระบบ
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">เมนู</li>
          <!-- Menu 0.1 -->
          <li class="treeview">
            <!-- <a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
            </a> -->
          </li>
          <!-- Menu 1 -->
          <li class="treeview">
            <a href="#"><i class="fa fa-archive"></i><span>สินค้า</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="product-add.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลสินค้า</a></li>
              <li><a href="product-list.php"><i class="fa fa-cog"></i>จัดข้อมูลการสินค้า</a></li>
            </ul>
          </li>
          <!-- Menu 2 -->
          <li class="treeview">
            <a href="#"><i class="fa fa-project-diagram"></i><span>โครงการ</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="project-add.php"><i class="fa fa-plus"></i>เพิ่มโครงการ</a></li>
              <li><a href="project-list.php"><i class="fa fa-cog"></i>จัดการโครงการ</a></li>
              <li><a href="project-list.php"><i class="fa fa-folder-closed"></i>โครงการที่ปิดแล้ว</a></li>
            </ul>
          </li>
          <!-- Menu 3 -->
          <li class="treeview">
            <a href="#"><i class="fa fa-users"></i><span>ลูกค้า</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="customer-add.php"><i class="fa fa-user-plus"></i>เพิ่มข้อมูลลูกค้า</a></li>
              <li><a href="customer-list.php"><i class="fa fa-cog"></i>จัดการข้อมูลลูกค้า</a></li>
            </ul>
          </li>

          <!-- Menu 4 -->
          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i><span>พนักงาน</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="employee-add.php"><i class="fa fa-plus"></i>เพิ่มข้อมูลพนักงาน</a></li>
              <li><a href="employee-list.php"><i class="fa fa-cog"></i>จัดการข้อมูลพนักงาน</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="logout.php" id="action_logout">
              <i class="fa fa-sign-out"></i><span><b>ออกจากระบบ</b></span>
            </a>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content">

        <!-- Your Page Content Here -->