<?php
session_start();
error_reporting(0);
include('../../Connect/config.php');

include("../include/new-taikhoan.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="../../Content/DangKy.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="line">
                <h3>
                    Welcome to HQM glasses!
                    <h3 style="font-family:none; text-align:right; width:82%"></h3>
                </h3>
            </div>

            <div class="menu">
                <div class="drop">
                    <a href="../Home/sanpham.php" class="item ">Sản phẩm</a>
                    <div class="drop-menu">
                        <a href="../Home/matkinhnu.php">Mắt kính nữ</a>
                        <a href="../Home/matkinhnam.php">Mắt kính nam</a>
                        <a href="../Home/matkinhtreem.php">Mắt kính trẻ em</a>
                    </div>
                </div>


                <a href="#footer-page" class="item">Liên hệ</a>

                <a href="../Home/trangchu.php" class="logo"><img src="../../img/HQM.png" width="180px" height="80px" alt=""></a>
                
                <?php if (strlen($_SESSION['login'])) {   ?>
                    <a href="../Home/giohang.php" class="item">Giỏ Hàng</a>
                    <a href="../User/myaccount.php"><i class="item"></i>My Account</a>
                <?php } ?>

                <?php if (strlen($_SESSION['login']) == 0) {   ?>
                    <a href="../User/dangky.php" class="item">Đăng ký</a>
                    <a href="../User/dangnhap.php" class="item">Đăng nhập</a>
                <?php } else { ?>
                    
                    <a href="../User/dangxuat.php"><i class="item"></i>Đăng xuất</a>
                <?php } ?>

            </div>
        </div>
        <!-- main -->
        <div class="main-w3layouts wrapper">

            <div class="main-agileinfo">
                <div class="agileits-top">
                    <p><?php echo !empty($result) ? $result : ''; ?></p>
                    <form action="#" method="post">
                        <h1>Đăng ký</h1>
                        <input class="text w3lpass" type="text" name="HoTen" id="HoTen" placeholder="Họ Tên" required="">

                        <input class="text w3lpass" type="text" name="TaiKhoan" id="TaiKhoan" placeholder="Tài Khoản" required="">

                        <input class="text w3lpass" type="password" name="MatKhau" id="MatKhau" placeholder="Mật Khẩu" required="">

                        <input class="text w3lpass" type="email" name="Email" id="Email" placeholder="Email" required="">

                        <input class="text w3lpass" type="text" name="SoDienThoaiKH" id="DienThoaiKH" placeholder="Số Điện Thoại" required="">

                        <input class="text w3lpass" type="text" name="DiaChiKH" id="DiaChiKH" placeholder="Địa Chỉ" required="">

                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>I Agree To The Terms & Conditions</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" value="SIGNUP" name="save" class="btn btn-primary">

                    </form>
                    <p>Đã có tài khoản? <a href="../User/dangnhap.php"> Đăng nhập!</a></p>
                </div>
            </div>
            <!-- copyright -->
            <div class="colorlibcopy-agile">
                <p>HQM Glasses</p>
            </div>
            <!-- //copyright -->
            <ul class="colorlib-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
    <!-- //main -->
</body>

</html>