<?php session_start();?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin THE PATEL</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <!--<link href="assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">-->
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">THE PATEL HOTEL & RESTAURANT</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                         <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
						 <!--<a style="font-size:25px;margin:8px;padding:17px"><b>THE PATEL</b></a>-->
                         <img />
                         <!-- Light Logo text -->    
                         <img  /></span> </a>
                </div>
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <h2 style="color:yellow">THE PATEL</h2>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="assets/images/users/login-icon.png" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="#" style="color:blue" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?><span class="caret"></span></a>
	                           <div class="dropdown-menu animated flipInY">
								<a href="logout.php" class="dropdown-item" name="logout"><i class="fa fa-power-off"></i> Logout</a>
                               </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- MANAGEMENTS</li>
						<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Room</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="room_book_info_edit.php">Booking Info</a></li>
                                <li><a href="add_room.php">Add Room</a></li>
								<li><a href="room_info.php">Room Info</a></li>
								<li><a href="book_room_no.php">Book Room No</a></li>
                            </ul>
                        </li>
						<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="user_details.php">User Details </a></li>
                                <li><a href="add_user.php">Add Client</a></li>
							</ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Restaurants</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="item_order_info.php">Order Info</a></li>
                                <!--<li><a href="#">Book Order</a></li>-->
                                <li><a href="add_item.php">Add Item</a></li>
								<li><a href="item_info.php">Item Info.</a></li>
                            </ul>
                        </li>
                       <!-- <li class="nav-small-cap">REVIEWS &amp; CONTACT US</li>-->
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" href="reviews.php" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Reviews</span></a>
							<ul aria-expanded="false" class="collapse">
                                <li><a href="reviews.php">Reviews</a></li>
							</ul>
						</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Contact US</span></a>
							<ul aria-expanded="false" class="collapse">
                                <li><a href="details.php">Details</a></li>
							</ul>
						</li>
                      </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Welcome , <b style="color:blue"><?php 
																	if(isset($_SESSION['name']))
																			echo $_SESSION['name'];
																	else
																		echo '<script> window.location="login.php" </script>';
																	?></b></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
							<a href="check_rooms.php" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Check Rooms</a>
                            <a href="book_room.php" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Book Rooms</a>
                        </div>
                    </div>
	            </div>
				<!-- Starting of div(footer.php) for display(table,..) -->
				<div>
				