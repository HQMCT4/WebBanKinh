<?php 
    include("../connectdb.php");
    if(isset($_POST['submit'])){
        $MaLoaiKinh=$_POST['MaLoaiKinh'];
        $name=$_POST['TenLoaiKinh'];

        $sql="insert into `loaikinh`(MaLoaiKinh,TenLoaiKinh) values('$MaLoaiKinh','$name')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo"<script>alert('Thêm thành công!')</script>";
            echo"<script>window.open('../qlloaisanpham/dsloaisanpham.php?dsloaisanpham','_self')</script>";
        }else{
            die(mysqli_error($con));
        }
    } 
?>
<img src="" alt="">
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
    <h1 class="my-5" style="text-align: center">THÊM MỚI LOẠI SẢN PHẨM</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã Loại Sản Phẩm</label>
                <input type="text" class="form-control" name="MaLoaiKinh">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên Loại Sản Phẩm</label>
                <input type="text" class="form-control" name="TenLoaiKinh">
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