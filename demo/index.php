<?php
error_reporting(0);
session_start();
include '../connect.php';
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
include '../demo/head.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashborad</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">


    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap%22");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: "Prompt", sans-serif;
        }
    </style>


    <link href='<?= $fullcalendar_path ?>/core/main.css' rel='stylesheet' />
    <link href='<?= $fullcalendar_path ?>/daygrid/main.css' rel='stylesheet' />

    <script src='<?= $fullcalendar_path ?>/core/main.js'></script>
    <script src='<?= $fullcalendar_path ?>/daygrid/main.js'></script>

    <style type="text/css">
        #calendar {
            width: 800px;
            margin: auto;
        }
    </style>
    <!-- datetime -->
    <link rel="stylesheet" href="js/jquery.datetimepicker.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventLimit: true,
                defaultDate: new Date(),
                timezone: 'Asia/Bangkok',
                events: {
                    url: './dataEvents.php',
                },
                loading: function(bool) {
                    $('#loading').toggle(bool);
                },

                eventClick: function(event) {
                    if (event.url) {
                        $.fancybox({
                            'href': event.url,
                            'type': 'iframe',
                            'autoScale': false,
                            'openEffect': 'elastic',
                            'openSpeed': 'fast',
                            'closeEffect': 'elastic',
                            'closeSpeed': 'fast',
                            'closeBtn': true,
                            onClosed: function() {
                                parent.location.reload(true);
                            },
                            helpers: {
                                thumbs: {
                                    width: 50,
                                    height: 50
                                },

                                overlay: {
                                    css: {
                                        'background': 'rgba(49, 176, 213, 0.7)'
                                    }
                                }
                            }
                        });
                        return false;
                    }
                },
            });
        });
    </script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <img src="../demo/assets/images/logo/logo2.png" alt="Logo">
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>ข้อมูลผู้ใช้</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="memberlist.php">ข้อมูลผู้ใช้ทั้งหมด</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="memberRigister.php">เพิ่มข้อมูลผู้ใช้</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="bi bi-easel-fill"></i>
                                <span>จัดการห้องประชุม</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="roomList.php">ข้อมูลห้องประชุมทั้งหมด</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="roomAdd.php">เพิ่มข้อมูลห้องประชุม</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="book_room.php" class='sidebar-link'>
                                <i class="bi bi-display"></i>
                                <span>จองห้องประชุม</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="book_detail.php" class='sidebar-link'>
                                <i class="bi bi-credit-card"></i>
                                <span>ข้อมูลการจองของฉัน</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="book_user.php" class='sidebar-link'>
                                <i class="bi bi-credit-card-2-back-fill"></i>
                                <span>ข้อมูลการจองของผู้ใช้งาน</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="statistics.php" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>รายงานสถิติประจำเดือน</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="personaldetail.php" class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>ข้อมูลส่วนตัว</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="backend\logout.php" class='sidebar-link'>
                                <i class="bi bi-power"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>



            <div class="page-heading">
                <h3>Dashborad</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-20">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">ผู้ใช้งานทั้งหมด</h6>
                                                <?php

                                                if (!isset($_GET['action'])) {
                                                    $meSQL = ("SELECT COUNT(ID_member) FROM member");
                                                    $meQuery = $conn->query($meSQL);
                                                    $count = $meQuery->fetchColumn();

                                                ?>
                                                    <h6 class="font-extrabold mb-0"> <?php echo $count  ?> คน</h6>
                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Admin</h6>
                                                <?php


                                                if (!isset($_GET['action'])) {


                                                    $meSQL = ("SELECT COUNT(ID_Member) FROM Division INNER Join Member 
                                                    ON dbo.Division.ID_Division=dbo.Member.ID_Division where Responsibility Like 'Admin'");
                                                    $meQuery = $conn->query($meSQL);
                                                    $count = $meQuery->fetchColumn();

                                                ?>
                                                    <h6 class="font-extrabold mb-0"> <?php echo $count  ?> คน</h6>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">User</h6>
                                                <?php

                                                if (!isset($_GET['action'])) {

                                                    $meSQL = ("SELECT COUNT(ID_Member) FROM Division INNER Join Member 
                                                    ON dbo.Division.ID_Division=dbo.Member.ID_Division where Responsibility Like 'User'");
                                                    $meQuery = $conn->query($meSQL);
                                                    $count = $meQuery->fetchColumn();

                                                ?>
                                                    <h6 class="font-extrabold mb-0"> <?php echo $count  ?> คน</h6>
                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldCalendar"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="./fullcalendar-4.4.2/fullcalendar-php-master/index.php" class="btn btn-outline-primary">ปฏิทินการจองห้องประชุม</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </section>
            </div>




        </div>

    </div>
    </div>


    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar-2.1.1/lib/moment.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar-2.1.1/fullcalendar.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar-2.1.1/lang/th.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>