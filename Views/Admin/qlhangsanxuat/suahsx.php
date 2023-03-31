<?php
include("../connectdb.php");
$id = $_GET['chinhsuaid'];
$sql = "select * from `hangsanxuat` where MaHSX=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$TenHSX = $row['TenHSX'];
$DiaChiHSX = $row['DiaChiHSX'];
$DienThoaiHSX = $row['DienThoaiHSX'];

if (isset($_POST['submit'])) {
    $TenHSX = $_POST['TenHSX'];
    $DiaChiHSX = $_POST['DiaChiHSX'];
    $DienThoaiHSX = $_POST['DienThoaiHSX'];

    $sql = "update `hangsanxuat` set MaHSX=$id, TenHSX='$TenHSX', DiaChiHSX='$DiaChiHSX', DienThoaiHSX='$DienThoaiHSX' where MaHSX=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo"<script>alert('Chỉnh sửa thành công!')</script>";
        echo"<script>window.open('../qlhangsanxuat/dshsx.php?dshsx','_self')</script>";
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
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" type="text/css" href="../../../Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../Scripts/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="my-5" style="text-align: center">CHỈNH SỬA THÔNG TIN</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên hãng</label>
                <input type="text" class="form-control" name="TenHSX" value=<?php echo $TenHSX; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Địa Chỉ HSX</label>
                <input type="text" class="form-control" name="DiaChiHSX" value=<?php echo $DiaChiHSX; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SDT LH</label>
                <input type="text" class="form-control" name="DienThoaiHSX" value=<?php echo $DienThoaiHSX; ?>>
            </div>
            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back()" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary">Chỉnh sửa</button></div>
            </div>
        </form>
    </div>

</body>

</html>