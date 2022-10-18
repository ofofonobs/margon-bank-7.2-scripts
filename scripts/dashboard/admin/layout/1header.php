<?php
session_start();
include ('session.php');


if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update Transfer Records</title>
    <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta charset="UTF-8">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
	 <!-- CSS -->
	 <!-- Bootstrap 3.3.4 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	 <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/icons.css" rel="stylesheet">
    <link href="css/generics.css" rel="stylesheet"> 
</head>
<body id="skin-blur-lights">

    <header id="header" class="media">
        <a href="index.php" id="menu-toggle"></a> 
        <a class="logo pull-left" href="index.php"><img src="" class="img-responsive" alt=""></a>

        <div class="media-body">
            <div class="media" id="top-menu">

                <div id="time" class="pull-right">
                    <span id="hours"></span>
                    :
                    <span id="min"></span>
                    :
                    <span id="sec"></span>
                </div>


            </div>
        </div>
    </header>

    <div class="clearfix"></div>

    <section id="main" class="p-relative" role="main">

        <!-- Sidebar -->
        <aside id="sidebar">

            <!-- Sidbar Widgets -->
            <div class="side-widgets overflow">
                <!-- Profile Menu -->
                <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                    <a href="index.php" data-toggle="dropdown">
                        <img class="profile-pic animated" src="img/htb.jpg" alt="">
                    </a>
                    <ul class="dropdown-menu profile-menu">

                        <li><a href="logout.php">Sign Out</a> <i class="fa fa-sign-out icon left">&#61903;</i><i class="icon right fa fa-sign-out">&#61815;</i></li>
                        <li><a href="#edit" data-toggle="modal">Edit Profile</a><i class="right fa fa-edit fa-2x"></i></li>
                    </ul>
                    <h4 class="m-0">ADMIN</h4>

                </div>

                <!-- Calendar -->
                <div class="s-widget m-b-25">
                    <div id="sidebar-calendar"></div>
                </div>

                <!-- Feeds -->
                <div class="s-widget m-b-25">
                    <h2 class="tile-title">
                      
                    </h2>
                    <div class="">

                       
                    </div>
                    <div class="s-widget-body">
                        <div id="news-feed"></div>
                    </div>
                </div>

                <!-- Projects -->

            </div>

            <!-- Side Menu -->
            <ul class="list-unstyled side-menu">
                <li>
                    <a class="sa-side-home" href="index.php">
                        <span class="menu-item">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown active">
                    <a class="sa-list-vcard" href="">
                        <span class="menu-item">Accounts</span>
                    </a>
                    <ul class="list-unstyled menu-item">
                        <li><a href="create_account.php">Create Account</a></li>
                        <li><a href="view_account.php">View Accounts</a></li>
                        <li><a href="update.php">Update Accounts</a></li>
                        <li><a href="upload.php">Upload Image</a></li>

                    </ul>
                </li>
                <li>
                    <a class="sa-list-secret" href="pending_accounts.php">
                        <span class="menu-item">Pending Accounts</span>
                    </a>
                </li>
                <li>
                    <a class="sa-top-message" href="messages.php">
                        <span class="menu-item">Messages</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-comment" href="tickets.php">
                        <span class="menu-item">Tickets</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-database" href="credit_debit_list.php">
                        <span class="menu-item">Credit/Debit History</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-cc" href="transfer_rec.php">
                        <span class="menu-item">Transaction Records</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-cog" href="settings.php">
                        <span class="menu-item">Settings</span>
                    </a>
                </li>


            </ul>

        </aside>
		 <section id="content" class="container">
           

            <!-- Required Feilds -->
            <div class="block-area" id="required">
