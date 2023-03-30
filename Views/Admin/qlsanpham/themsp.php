<?php
include("../connectdb.php");
if (isset($_POST['submit'])) {
    $MaLoaiKinh = $_POST['MaLoaiKinh'];
    $MaHSX = $_POST['MaHSX'];
    $TenKinh = $_POST['TenKinh'];
    $GiaBan = $_POST['GiaBan'];
    $MoTa = $_POST['MoTa'];  
    $SoLuongTon = $_POST['SoLuongTon']; 
    $stt = 'true';
    //hình sản phẩm
    $AnhBia = $_FILES['AnhBia']['name'];
    $temp_AnhBia = $_FILES['AnhBia']['tmp_name'];

    if (!$con) {
        die(mysqli_error($con));
    } else {
        move_uploaded_file($temp_AnhBia,"../../../img/$AnhBia");
        $sql = "insert into `kinh`(MaLoaiKinh,MaHSX,TenKinh,GiaBan,MoTa,AnhBia,NgayCapNhat,SoLuongTon) values('$MaLoaiKinh','$MaHSX','$TenKinh','$GiaBan','$MoTa','$AnhBia',NOW(),'$SoLuongTon')";
        $result = mysqli_query($con, $sql);
        echo"<script>alert('Thêm thành công!')</script>";
        echo"<script>window.open('../qlsanpham/dssanpham.php?dssanpham','_self')</script>";
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
    <h1 class="my-5" style="text-align: center">THÊM MỚI SẢN PHẨM</h1>
    <div class="container p-4 my-5 border">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group" >
                <label for="TenKinh">Tên sản phẩm</label>
                <input type="text" class="form-control" name="TenKinh" id="TenKinh" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="AnhBia">Hình sản phẩm</label>
                <input type="file" class="form-control" name="AnhBia" id="AnhBia">
            </div>
            <div class="form-group">
                <label for="GiaBan">Giá tiền</label>
                <input type="text" class="form-control" name="GiaBan" id="GiaBan" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="SoLuongTon">Số Lượng Tồn</label>
                <input type="text" class="form-control" name="SoLuongTon" id="SoLuongTon" autocomplete="off">
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
                <label for="NoiDung">Mô tả</label>
                <input type="text" class="form-control" name="MoTa" id="MoTa" autocomplete="off">
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
            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">Thêm mới</button></div>
            </div>
        </form>
    </div>

</body>

</html>