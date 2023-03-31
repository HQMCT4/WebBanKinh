<?php
$con=new mysqli('localhost','root','','webbankinh');
if(!$con){
    die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../Scripts/bootstrap.min.js"></script>
    <script src=""></script>
    <title>DANH SÁCH ADMIN</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../../../DoAnPHP/Views/Home/trangchu.php">HQM SHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../../DoAnPHP/Views/Admin/index.php">DASHBOARD HQM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../../DoAnPHP/Views/Admin/qlsanpham/dssanpham.php">QL SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../Views/Admin/qlloaisanpham/dsloaisanpham.php">QL LOẠI SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">QL ĐƠN HÀNG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../../DoAnPHP/Views/Admin/qlhangsanxuat/dshsx.php">QL HÃNG SẢN XUẤT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../../DoAnPHP/Views/Admin/qlkhachhang/dskhachhang.php">QL KHÁCH HÀNG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../../DoAnPHP/Views/Admin/qladmin/dsadmin.php">QL ADMIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between bg-white mb-3">
            <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
            <div class="p-2 bg-white"></div>
            <div class="p-2 bg-white"><button class="btn btn-primary me-md-2" type="button"><a href="../qladmin/themad.php" class="text-light">Thêm mới</a></button></div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tài Khoản</th>
                    <th scope="col">Mật Khẩu</th>
                    <th scope="col">Họ Tên Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `admin`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $name = $row['TK'];
                        $pass = $row['MK'];
                        $HoTenAD = $row['HoTenAD'];
                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $pass . '</td>
                        <td>' . $HoTenAD . '</td>
                        <td>
                        <button class="btn btn-secondary"><a href="../qladmin/suaad.php?chinhsuaid=' . $id . '" class="text-light">Chỉnh sửa</a></button>
                        <button class="btn btn-danger"><a href="../qladmin/xoaad.php?xoaid=' . $id . '" class="text-light">Xóa</a></button>
                        </td>
                    </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="my-5"></div>
    <?php
    ?>
</body>

</html>