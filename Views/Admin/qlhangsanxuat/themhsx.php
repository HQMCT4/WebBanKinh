<?php 
    include("../connectdb.php");
    if(isset($_POST['submit'])){
        $TenHSX=$_POST['TenHSX'];
        $DiaChiHSX=$_POST['DiaChiHSX'];
        $DienThoaiHSX=$_POST['DienThoaiHSX'];

        $sql="insert into `hangsanxuat`(TenHSX,DiaChiHSX,DienThoaiHSX) values('$TenHSX','$DiaChiHSX','$DienThoaiHSX')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo"<script>alert('Thêm thành công!')</script>";
            echo"<script>window.open('../qlhangsanxuat/dshsx.php?dshsx','_self')</script>";
        }else{
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
    <title>Thêm mới</title>
    <link rel="stylesheet" type="text/css" href="../../../Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../Scripts/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="my-5" style="text-align: center">THÊM MỚI HÃNG SẢN XUẤT</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên hãng</label>
                <input type="text" class="form-control" name="TenHSX">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Địa Chỉ Hãng</label>
                <input type="text" class="form-control" name="DiaChiHSX">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SDT LH</label>
                <input type="text" class="form-control" name="DienThoaiHSX">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">Thêm mới</button>
        </form>
    </div>

</body>

</html>