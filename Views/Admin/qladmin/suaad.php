<?php 
    include("../connectdb.php");
    $id=$_GET['chinhsuaid'];
    $sql="select * from `admin` where ID=$id";
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    $name=$row['TK'];
    $pass=$row['MK'];
    $mail=$row['HoTenAD'];

    if(isset($_POST['submit'])){
        $name=$_POST['TK'];
        $pass=$_POST['MK'];
        $mail= $_POST['HoTenAD'];

        $sql="update `admin`set ID=$id, TK='$name', MK='$pass', HoTenAD='$mail' where ID=$id";
        $result = mysqli_query($con,$sql);
        if($result){
            echo"<script>alert('Chỉnh sửa thành công!')</script>";
            echo"<script>window.open('../qladmin/dsadmin.php?dsadmin','_self')</script>";
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
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../../../Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../Scripts/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="my-5" style="text-align: center">QUẢN LÝ TÀI KHOẢN ADMIN</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tài Khoản</label>
                <input type="text" class="form-control" name="TK" value=<?php echo$name;?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật Khẩu</label>
                <input type="password" class="form-control" name="MK" value=<?php echo$pass;?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Họ Tên</label>
                <input type="HoTenAD" class="form-control" name="HoTenAD" value=<?php echo$mail;?>>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">Chỉnh sửa</button>
        </form>
    </div>

</body>

</html>