<?php
include("../connectdb.php");
$id = $_GET['chinhsuaid'];
$sql = "select * from `loaikinh` where MaLoaiKinh=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$MaLoaiKinh = $row['MaLoaiKinh'];
$TenLoaiKinh = $row['TenLoaiKinh'];

if (isset($_POST['submit'])) {
    $MaLoaiKinh = $_POST['MaLoaiKinh'];
    $TenLoaiKinh = $_POST['TenLoaiKinh'];

    $sql = "update `loaikinh` set MaLoaiKinh=$id, MaLoaiKinh='$MaLoaiKinh', TenLoaiKinh='$TenLoaiKinh' where MaLoaiKinh=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo"<script>alert('Chỉnh sửa thành công!')</script>";
        echo"<script>window.open('../qlloaisanpham/dsloaisanpham.php?dsloaisanpham','_self')</script>";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../../../Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../Scripts/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="my-5" style="text-align: center">THÊM MỚI SẢN PHẨM</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã loại sản phẩm</label>
                <input type="text" class="form-control" name="MaLoaiKinh" value=<?php echo $MaLoaiKinh; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên loại sản phẩm</label>
                <input type="text" class="form-control" name="TenLoaiKinh" value=<?php echo $TenLoaiKinh; ?>>
            </div>
            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary">Chỉnh sửa</button></div>
            </div>
        </form>
    </div>

</body>

</html>