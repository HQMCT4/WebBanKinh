<?php
session_start();
if(!isset($_SESSION['TK'])){
    header('location:loginAd.php');
}
?>