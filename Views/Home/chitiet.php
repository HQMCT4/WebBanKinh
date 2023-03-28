<?php include('../include/detail.php') ?>
<?php
include_once("../include/header.php"); ?>

<div class="navbar">
    <div class="banner">
        <img src="../../img/HQM.gif" alt="">
    </div>
</div>
<div class="signature">
    <div class="content">

    </div>
    <div class="clear"></div>
</div>

<h2 style="padding-left:775px">Chi Tiết Sản Phẩm</h2>
<div class="navbar">
    <div class="content">
        <div class="Detail">
        <p><?php echo !empty($result) ? $result : ''; ?></p>
            <div class="row">
                <div class="pic">
                    <img class="Img" src="../../img/<?php echo $detailData['AnhBia'] ?? ''; ?>" width="550" height="550">
                </div>
                <div class="text">
                    <h2 style="color:red"><?php echo $detailData['TenKinh'] ?? ''; ?></h2>
                    <h2 style="color:red"> <?php echo $detailData['GiaBan'] ?? ''; ?> VNĐ</h2>
                    <div class="statistic">
                        <p>
                            Chiều dài càng kính: 14.8;
                            Chiều dài mắt kính: 5.8;
                            Chiều dài cầu mũi: 1.6.
                        </p>
                    </div>
                    <div class="Mota">
                        <p>                            
                            <?php echo $detailData['MoTa'] ?? ''; ?>
                        </p>
                    </div>
                    <div style="color:red"><strong>Số lượng: <?php echo $detailData['SoLuongTon'] ?? ''; ?> </strong></div>

                    <div class="add-to-cart">
                        <a href="">Thêm vào giỏ hàng</a>
                    </div>
                    <div class="dathang">
                        <a href="">Đặt Hàng</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../include/footer.php");
?>