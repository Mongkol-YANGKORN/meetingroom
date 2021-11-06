<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>

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
                                <h4 class="card-title">แสดงข้อมูลห้องประชุม</h4>
                            </div>
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form" method="post" action="backend\roomeditdata.php">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Member_Name-column">รหัสห้องประชุม</label>
                                                        <?php
                                                        include '../connect.php';
                                                        $room = $_GET['ID_Room'];
                                                        if (isset($_GET['ID_Room'])) {

                                                            $meSQL = "SELECT * from Room INNER JOIN dbo.Room_Detail ON Room.ID_Room = Room_Detail.ID_Room 
                                                            inner join dbo.Equipment on Equipment.ID_Equipment = Room_Detail.ID_Equipment Where dbo.Room.ID_Room ='$room'";
                                                            $meQuery = $conn->query($meSQL);
                                                        ?>
                                                            <?php
                                                            $rs = $meQuery->fetch(PDO::FETCH_ASSOC)
                                                            ?>
                                                            <div class="form-group">
                                                                <label for="Member_Name-column"> <?php echo $rs["ID_Room"]; ?> </label>
                                                                <input type="hidden" name="ID_Room" value="<?php echo $rs["ID_Room"]; ?>" />

                                                            </div>

                                                    </div>
                                                <?php
                                                        } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Member_Name-column">ชื่อห้องประชุม</label>
                                                    <input type="text" id="Member_Name-column" class="form-control" placeholder="ชื่อห้องประชุม" name="room_Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Username-column">จำนวนที่นั่ง</label>
                                                    <input type="text" id="Username-column" class="form-control" placeholder="จำนวนที่นั่ง" name="Num_seat">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Password-column">อุปกรณ์</label>
                                                </div>
                                                <!-- เดี๋ยวแก้เป็นดึงข้อมูลมาจาก db ให้เป็น checkbox -->
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                                            <label for="checkbox1">โปรเจคเตอร์</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">โทรทัศน์</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">กระดานไวท์บอร์ด</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">ไมค์-ลำโพง</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">คอมพิวเตอร์</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Username-column">รายละเอียดเพิ่มเติม</label>
                                                    <input type="text" id="Username-column" class="form-control" placeholder="รายละเอียดเพิ่มเติม" name="Room_Dscription">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">

                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">บันทึก</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                        </div>
            </section>

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