<?php
session_start();
error_reporting(0);
include('../../Connect/config.php');

?>
<?php include('../include/funtions.php') ?>
<?php include_once("../include/header.php");?>

<div class="navbar">
            <div class="banner">
                <img src="../../img/HQM.gif" alt="">
            </div>
        </div>
        <div class="signature">
            <div class="content">
                <div class="col-md-9">
                    <div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <h2 style="padding-left:775px">Mắt Kính Trẻ Em HQM</h2>
        <?php sptreem() ?>
       
<?php include_once("../include/footer.php");?>