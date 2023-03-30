<?php 
    include("../connectdb.php");
    if(isset($_GET['xoaid'])){
        $id=$_GET['xoaid'];
        $sql="delete from `loaikinh` where MaLoaiKinh=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            echo"<script>alert('Xóa thành công!')</script>";
            echo"<script>window.open('../qlloaisanpham/dsloaisanpham.php?dsloaisanpham','_self')</script>";
        }else{
            die(mysqli_error($con));
        }
    }
?>