<?php
include('../include/funtions.php');

$result = mysqli_query($conn, 'SELECT count(MaKinh) as total from kinh');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$result = mysqli_query($conn, "SELECT * FROM kinh LIMIT $start, $limit");
?>
<?php include_once("../include/header.php"); ?>
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
        <!-- <script src="/js/popup.js"></script> -->
    </div>
    <div class="clear"></div>
</div>
<h2 style="padding-left:775px">Sản phẩm kính HQM</h2>
<div class="sp" style="display: block;clear:both;width:100%;">
    <?php while ($row = mysqli_fetch_assoc($result)) {
        $MaKinh = $row['MaKinh'];
        $TenKinh = $row['TenKinh'];
        $AnhBia = $row['AnhBia'];
        $GiaBan = $row['GiaBan'];
        echo
        "<div class='signature'>
    <div class='product'>
    <h4 class='productName'>$TenKinh</h4>
    <img class='productImg' src='../../img/$AnhBia' width='250'>
    <p class='productPrice '>$GiaBan VNĐ</p>
    <a href='chitiet.php?id=$MaKinh' class='productDetail '>Chi tiết</a> 
    </div>
</div>";
    } ?>
</div>
<div class="pagination" style="display: block;clear:both;width:100%;text-align: center;padding-top: 70px;">
    <?php

    if ($current_page > 1 && $total_page > 1) {
        echo '<a href="sanpham.php?page=' . ($current_page - 1) . '">Prev</a> | ';
    }

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $current_page) {
            echo '<span>' . $i . '</span> | ';
        } else {
            echo '<a href="sanpham.php?page=' . $i . '">' . $i . '</a> | ';
        }
    }

    if ($current_page < $total_page && $total_page > 1) {
        echo '<a href="sanpham.php?page=' . ($current_page + 1) . '">Next</a>  ';
    }
    ?>
</div>
<?php include_once("../include/footer.php"); ?>