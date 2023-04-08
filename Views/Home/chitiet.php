<?php
session_start();
error_reporting(0);
include('../../Connect/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM Kinh WHERE MaKinh={$id}";
        $query_p = mysqli_query($conn, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['MaKinh']] = array("quantity" => 1, "price" => $row_p['GiaBan']);
        } else {
            $message = "Mã sản phẩm không tồn tại";
        }
    }
    echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng')</script>";
    echo "<script type='text/javascript'> document.location ='giohang.php'; </script>";
}
?>
<?php include('../include/detail.php') ?>
<?php include_once("../include/header.php"); ?>

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

<h2 style="padding-left:40%">Chi Tiết Sản Phẩm</h2>
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
                            <br>
                            Chiều dài mắt kính: 5.8;
                            <br>
                            Chiều dài cầu mũi: 1.6.
                        </p>
                    </div>
                    <div class="Mota">
                        <p>
                            <?php echo $detailData['MoTa'] ?? ''; ?>
                        </p>
                    </div>

                    <div class="add-to-cart">
                        <a href="chitiet.php?page=product&action=add&id=<?php echo $_GET['id']; ?>">Thêm vào giỏ hàng</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../include/footer.php");
?>