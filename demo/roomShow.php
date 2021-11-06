<?php
session_start();
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลส่วนตัว</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

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
                                <li class="submenu-item ">
                                    <a href="EquipmentAdd.php">เพิ่มข้อมูลอุปกรณ์ห้องประชุม</a>
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
                            <a href="../index.html" class='sidebar-link'>
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
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ข้อมูลห้อง</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php
                                    include '../connect.php';
                                    if (isset($_GET['ID_Room'])) {
                                        $room =  $_GET['ID_Room'];

                                        $meSQL = ("SELECT * from Room INNER JOIN dbo.Room_Detail ON Room.ID_Room = Room_Detail.ID_Room 
                                        inner join dbo.Equipment on Equipment.ID_Equipment = Room_Detail.ID_Equipment Where dbo.Room.ID_Room = '$room'");
                                        $meQuery = $conn->query($meSQL);

                                    ?>
                                        <?php
                                        $i = 1;
                                        $rs = $meQuery->fetch(PDO::FETCH_ASSOC)
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="ID_Room-column">รหัสห้อง</label>
                                                    <br>
                                                    <label><?php echo $rs['ID_Room']; ?></label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Num_Seat-column">จำนวนที่นั่ง</label>
                                                    <br>
                                                    <label><?php echo $rs['Num_Seat']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Equipment_Name-column">ชื่ออุปกรณ์</label>
                                                    <br>
                                                    <label><?php
                                                            $meSQL = ("SELECT * from Room INNER JOIN dbo.Room_Detail ON Room.ID_Room = Room_Detail.ID_Room 
                                                                inner join dbo.Equipment on Equipment.ID_Equipment = Room_Detail.ID_Equipment Where dbo.Room.ID_Room = '$room'");
                                                            $meQuery = $conn->query($meSQL);
                                                            while ($rsd = $meQuery->fetch(PDO::FETCH_ASSOC)) {
                                                                echo $rsd['Equipment_Name'] . ' ';
                                                            }
                                                            ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Room_Dscription-column">รายละเอียดเพิ่มเติม</label>
                                                    <br>
                                                    <label><?php echo $rs['Room_Dscription']; ?></label>
                                                </div>

                                            </div>


                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

    </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>