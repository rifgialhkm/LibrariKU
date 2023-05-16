<?php 

$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);
require_once 'connect.php';

session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location: login.php');
}
$admin_login = $_SESSION['admin_login'];
$data = mysqli_query($sql, "SELECT * FROM `admin` WHERE `email` = '$admin_login'");

$admin_info = mysqli_fetch_assoc($data);

?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS | LibrariKU Management System</title>
    <!--load progress bar-->
    <script src="assets/vendor/pace/pace.min.js"></script>
    <link href="assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Magnific popup-->
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css">
     <!--dataTable-->
    <link rel="stylesheet" href="assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>LMS</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="assets/images/avatar/avatar_1.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= ucwords($admin_info['firstname']. ' ' .$admin_info['lastname']); ?></span>
                            <span class="user-profile">Admin</span>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item':'' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?= $page == 'user.php' ? 'active-item':'' ?>"><a href="user.php"><i class="fa fa-users" aria-hidden="true"></i><span>User</span></a></li>
                                <li class="has-child-item close-item <?= $page == 'add-book.php' ? 'open-item':'' ?><?= $page == 'manage-books.php' ? 'open-item':'' ?>">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'add-book.php' ? 'active-item':'' ?>"><a href="add-book.php">Add Book</a></li>
                                        <li class="<?= $page == 'manage-books.php' ? 'active-item':'' ?>"><a href="manage-books.php">Manage Books</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">