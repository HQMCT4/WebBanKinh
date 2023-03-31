<?php 
    include("../connectdb.php");
    if(isset($_GET['xoaid'])){
        $id=$_GET['xoaid'];
        $sql="delete from `hangsanxuat` where MaHSX=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            echo"<script>alert('Xóa thành công!')</script>";
            echo"<script>window.open('../qlhangsanxuat/dshsx.php?dshsx','_self')</script>";
        }else{
            die(mysqli_error($con));
        }
    }
?>