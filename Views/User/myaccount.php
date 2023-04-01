<?php
session_start();
error_reporting(0);
include('../../Connect/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:dangnhap.php');
} else {
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $sdt = $_POST['sdt'];
        $query = mysqli_query($conn, "update ttkhachhang set HoTen='$name', Email='$email', DiaChiKH='$address' ,SoDienThoaiKH='$sdt' where MaKH='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Thông tin đã được cập nhật');</script>";
        }
    }


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($conn, "SELECT MatKhau FROM  ttkhachhang where MatKhau='" . $_POST['cpass'] . "' && MaKH='" . $_SESSION['id'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $conn = mysqli_query($conn, "update ttkhachhang set MatKhau='" . $_POST['newpass'] . "' where MaKH='" . $_SESSION['id'] . "'");
            echo "<script>alert('Đổi mật khẩu thành công !!');</script>";
            header('location: dangxuat.php');
        } else {
            echo "<script>alert('Mật khẩu cũ không đúng !!');</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../Content/GioHang.css">

        <title>Đặt hàng</title>
    </head>

    <body>
        <div class="header">
            <div class="line">
                <h3>
                    Welcome to HQM glasses!
                    <h3 style="font-family:none; text-align:right; width:82%"></h3>
                </h3>
            </div>

            <div class="menu">
                <?php if (strlen($_SESSION['login'])) {   ?>
                    <a href="#"><i class="item"></i>Welcome <?php echo htmlentities($_SESSION['username']); ?></a>
                <?php } ?>
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
                <?php } ?>

                <?php if (strlen($_SESSION['login']) == 0) {   ?>
                    <a href="../User/dangky.php" class="item">Đăng ký</a>
                    <a href="../User/dangnhap.php" class="item">Đăng nhập</a>
                <?php } else { ?>
                    <a href="../User/myaccount.php"><i class="item"></i>My Account</a>
                    <a href="../User/dangxuat.php"><i class="item"></i>Đăng xuất</a>
                <?php } ?>
            </div>
        </div>

        <!-- hết header -->
        <div class="shopping-cart">
            <h1>Thông tin cá nhân</h1>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <h4>Thông tin</h4>
                        <div class="col-md-12 col-sm-12 already-registered-login">
                            <?php
                            $query = mysqli_query($conn, "select * from ttkhachhang where MaKH='" . $_SESSION['id'] . "'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>

                                <form class="register-form" role="form" method="post">
                                    <div class="form-group">
                                        <label class="info-title" for="name">Họ Tên<span>*</span></label>
                                        <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['HoTen']; ?>" id="name" name="name" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="email1" name="email" value="<?php echo $row['Email']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="Contact No.">Địa chỉ <span>*</span></label>
                                        <input type="text" class="form-control unicase-form-control text-input" id="address" name="address" required="required" value="<?php echo $row['DiaChiKH']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="Contact No.">Số điện thoại <span>*</span></label>
                                        <input type="text" class="form-control unicase-form-control text-input" id="sdt" name="sdt" required="required" value="<?php echo $row['SoDienThoaiKH']; ?>" maxlength="10">
                                    </div>
                                    <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Cập nhật</button>
                                </form>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Đổi mật khẩu</h4>
                </div>
                <div class="panel-body">

                    <form class="register-form" role="form" method="post" name="chngpwd">
                        <div class="form-group">
                            <label class="info-title" for="Current Password">Mật khẩu cũ<span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="New Password">Mật khẩu mới <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="Confirm Password">Xác nhận mật khẩu <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required">
                        </div>
                        <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Thay đổi </button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>