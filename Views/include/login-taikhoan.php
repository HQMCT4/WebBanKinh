<?php
session_start();

error_reporting(0);
require('../../Connect/config.php');
    
if(isset($_POST['login']))
{
   $user=$_POST['user'];
   $password=$_POST['password'];
$query=mysqli_query($conn,"SELECT * FROM ttkhachhang WHERE TaiKhoan='$user' and MatKhau='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="Views/Home/trangchu.php";
$_SESSION['login']=$_POST['user'];
$_SESSION['id']=$num['MaKH'];
$_SESSION['username']=$num['HoTen'];
$host=$_SERVER['HTTP_HOST'];
// $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
$uri="/PHP_Web";
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="dangnhap.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>