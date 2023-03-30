<?php
include("../connectdb.php");
$id = $_GET['chinhsuaid'];
$sql = "select * from `kinh` where MaKinh=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['TenKinh'];
$pic = $row['AnhBia'];
$price = $row['GiaBan'];
$nsx = $row['MaHSX'];
$info = $row['MoTa'];
$idlsp = $row['MaLoaiKinh'];
$SoLuongTon = $row['SoLuongTon'];

if (isset($_POST['submit'])) {
    $name = $_POST['TenKinh'];
    $pic = $_POST['AnhBia'];
    $price = $_POST['GiaBan'];
    $nsx = $_POST['MaHSX'];
    $info = $_POST['MoTa'];
    $idlsp = $_POST['MaLoaiKinh'];
    $SoLuongTon = $_POST['SoLuongTon'];
    $sql = "update `kinh` set MaKinh=$id, TenKinh='$name', AnhBia='$pic', GiaBan='$price', MaHSX='$nsx', MoTa='$info', MaLoaiKinh='$idlsp', SoLuongTon='$SoLuongTon' where MaKinh=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo"<script>alert('Chỉnh sửa thành công!')</script>";
        echo"<script>window.open('../qlsanpham/dssanpham.php?dssanpham','_self')</script>";
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
    <h1 class="my-5" style="text-align: center">SỬA THÔNG TIN SẢN PHẨM</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" name="TenKinh" value=<?php echo $name; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hình sản phẩm</label>
                <input type="text" class="form-control" name="AnhBia" value=<?php echo $pic; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giá tiền</label>
                <input type="text" class="form-control" name="GiaBan" value=<?php echo $price; ?>>
            </div>
            <div class="form-group">
                <label for="">Hãng sản xuất</label>
                <select name="MaHSX" id="" class="form-select">
                    <option value="">Chọn hãng sản xuất</option>
                    <?php
                    $select_q="select * from hangsanxuat";
                    $result_q=mysqli_query($con,$select_q);
                    while($row=mysqli_fetch_assoc($result_q)){
                        $hsx_id=$row['MaHSX'];
                        $hsx_name=$row['TenHSX'];
                        echo"<option value='$hsx_id'>$hsx_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" class="form-control" name="MoTa" value=<?php echo $info; ?>>
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm</label>
                <select name="MaLoaiKinh" id="" class="form-select">
                <option value="">Chọn loại sản phẩm</option>
                    <?php
                    $select_q="select * from loaikinh";
                    $result_q=mysqli_query($con,$select_q);
                    while($row=mysqli_fetch_assoc($result_q)){
                        $lsp_id=$row['MaLoaiKinh'];
                        $lsp_name=$row['TenLoaiKinh'];
                        echo"<option value='$lsp_id'>$lsp_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số lượng tồn</label>
                <input type="text" class="form-control" name="SoLuongTon" value=<?php echo $SoLuongTon; ?>>
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