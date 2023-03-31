<?php
include("../connectdb.php");
if (isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $TK = $_POST['TK'];
    $MK = $_POST['MK'];
    $HoTenAD = $_POST['HoTenAD'];

    if (!$con) {
        die(mysqli_error($con));
    } else {
        $sql = "insert into `admin`(TK, MK, HoTenAD) values('$TK','$MK','$HoTenAD')";
        $result = mysqli_query($con, $sql);
        echo"<script>alert('thêm mới admin thành công!')</script>";
        echo"<script>window.open('../qladmin/dsadmin.php?dsadmin','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <link rel="stylesheet" type="text/css" href="../../../Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../Scripts/bootstrap.min.js"></script>
</head>
<body>
    <h1 class="my-5" style="text-align: center">THÊM MỚI ADMIN</h1>
    <div class="container p-4 my-5 border">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group" >
                <label for="TK">Tên Tài Khoản</label>
                <input type="text" class="form-control" name="TK" id="TK" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="MK">Mật Khẩu</label>
                <input type="text" class="form-control" name="MK" id="MK" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="HoTenAD">Họ Tên Admin</label>
                <input type="text" class="form-control" name="HoTenAD" id="HoTenAD" autocomplete="off">
            </div>

            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">Thêm mới</button></div>
            </div>
        </form>
    </div>

</body>

</html>