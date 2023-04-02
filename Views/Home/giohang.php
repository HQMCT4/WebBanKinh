<?php
session_start();
error_reporting(0);
include('../../Connect/config.php');
if (isset($_POST['submit'])) {
	if (!empty($_SESSION['cart'])) {
		foreach ($_POST['quantity'] as $key => $val) {
			if ($val == 0) {
				unset($_SESSION['cart'][$key]);
			} else {
				$_SESSION['cart'][$key]['quantity'] = $val;
			}
		}
		echo "<script>alert('Giỏ hàng đã được cập nhật.');</script>";
	}
}

// Code for Remove a Product from Cart
if (isset($_POST['remove_code'])) {

	if (!empty($_SESSION['cart'])) {
		foreach ($_POST['remove_code'] as $key) {

			unset($_SESSION['cart'][$key]);
		}
		echo "<script>alert('Sản phẩm đã được bỏ khỏi giỏ hàng.');</script>";
	}
}
// code for insert product in order table
if (isset($_POST['ordersubmit'])) {

	if (strlen($_SESSION['login']) == 0) {
		$extra = "Views/User/dangnhap.php";
		$host = $_SERVER['HTTP_HOST'];
		$uri = "/PHP_Web";
		header("location:http://$host$uri/$extra");
	} else {

		$quantity = $_POST['quantity'];
		$pdd = $_SESSION['pid'];
		$value = array_combine($pdd, $quantity);

		foreach ($value as $qty => $val34) {

			mysqli_query($conn, "insert into donhang(MaKH,MaKinh,SoLuong) values('" . $_SESSION['id'] . "','$qty','$val34')");
		}
		mysqli_query($conn, "update donhang set PTThanhToan='" . $_POST['paymethod'] . "' where MaKH='" . $_SESSION['id'] . "' and PTThanhToan is NULL ");
		unset($_SESSION['cart']);
		header('location:trangchu.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../Content/GioHang.css">

	<title>Đặt hàng</title>
</head>

<body>
	<div class="header">
		<div class="line">
			<h3>
				Welcome to HQM glasses!
				<h3 style="font-family:none; text-align:right; width:82%"></h3>
			</h3>
		</div>

		<div class="menu">
			<?php if (strlen($_SESSION['login'])) {   ?>
				<a href="#"><i class="item"></i>Welcome <?php echo htmlentities($_SESSION['username']); ?></a>
			<?php } ?>
			<div class="drop">
				<a href="../Home/sanpham.php" class="item ">Sản phẩm</a>
				<div class="drop-menu">
					<a href="../Home/matkinhnu.php">Mắt kính nữ</a>
					<a href="../Home/matkinhnam.php">Mắt kính nam</a>
					<a href="../Home/matkinhtreem.php">Mắt kính trẻ em</a>
				</div>
			</div>


			<a href="#footer-page" class="item">Liên hệ</a>

			<a href="../Home/trangchu.php" class="logo"><img src="../../img/HQM.png" width="180px" height="80px" alt=""></a>

			<?php if (strlen($_SESSION['login'])) {   ?>
				<a href="../Home/giohang.php" class="item">Giỏ Hàng</a>
			<?php } ?>

			<?php if (strlen($_SESSION['login']) == 0) {   ?>
				<a href="../User/dangky.php" class="item">Đăng ký</a>
				<a href="../User/dangnhap.php" class="item">Đăng nhập</a>
			<?php } else { ?>
				<a href="../User/myaccount.php"><i class="item"></i>My Account</a>
				<a href="../User/dangxuat.php"><i class="item"></i>Đăng xuất</a>
			<?php } ?>
		</div>
	</div>

	<!-- hết header -->

	<div class="shopping-cart">
		<form name="cart" method="post">
			<h1>Giỏ hàng</h1>
			<!---------------------->
			<?php
			if (!empty($_SESSION['cart'])) {
			?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<label class="product-image">Hình ảnh</label>
							<label class="product-details">Sản phẩm </label>
							<label class="product-quantity">Số lượng</label>

							<label class="product-price">Giá tiền</label>
							<label class="product-removal">Xóa</label>
							<label class="product-line-price">Thành tiền</label>
						</tr>
					</thead><!-- /thead -->

					<tbody>
						<?php
						$pdtid = array();
						$sql = "SELECT * FROM kinh WHERE MaKinh IN(";
						foreach ($_SESSION['cart'] as $id => $value) {
							$sql .= $id . ",";
						}
						$sql = substr($sql, 0, -1) . ") ORDER BY MaKinh ASC";
						$query = mysqli_query($conn, $sql);
						$totalprice = 0;
						$totalqunty = 0;
						if (!empty($query)) {
							while ($row = mysqli_fetch_array($query)) {
								$quantity = $_SESSION['cart'][$row['MaKinh']]['quantity'];
								$subtotal = $_SESSION['cart'][$row['MaKinh']]['quantity'] * $row['GiaBan'];
								$shipcost = 15000;
								$totalprice += $subtotal;
								$_SESSION['qnty'] = $totalqunty += $quantity;

								array_push($pdtid, $row['MaKinh']);
								//print_r($_SESSION['pid'])=$pdtid;exit;
						?>

								<tr>
									<div class="product">

										<div class="product-image">
											<img src="../../img/<?php echo $row['AnhBia']; ?>" alt="">
										</div>
										<div class="product-details">
											<div class="product-title">
												<a href="chitiet.php?id=<?php echo htmlentities($pd = $row['MaKinh']); ?>"><?php echo $row['TenKinh'];
																															$_SESSION['sid'] = $pd; ?></a>
											</div>
										</div>

										<div class="product-quantity">
											<div class="quant-input">
												<input type="number" value="<?php echo $_SESSION['cart'][$row['MaKinh']]['quantity']; ?>" name="quantity[<?php echo $row['MaKinh']; ?>]" />
											</div>
										</div>

										<div class="product-price"><?php echo " " . " " . $row['GiaBan']; ?></div>

										<div class="product-removal">
											<input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['MaKinh']); ?>" />
										</div>

										<div class="product-line-price"><?php echo ($_SESSION['cart'][$row['MaKinh']]['quantity'] * $row['GiaBan']); ?></div>

									</div>

								</tr>
						<?php }
						}
						$_SESSION['pid'] = $pdtid;
						?>

					</tbody><!-- /tbody -->
				</table><!-- /table -->

	</div><!-- /.shopping-cart-table -->
	<div class="col-md-4 col-sm-12">
		<span class="">
			<a href="../Home/sanpham.php" class="btn btn-upper btn-primary outer-left-xs">Tiếp tục mua hàng</a>
			<input type="submit" name="submit" value="Cập nhật giở hàng" class="btn btn-upper btn-primary pull-right outer-right-xs">
		</span>
	</div>
	<div class="col-md-4 col-sm-12 cart-shopping-total">
		<div class="totals">
			<div class="totals-item">
				<label>Phương thức thanh toán</label>
			</div>
			<div class="payment" name="payment" method="post">
				<label>
					<input type="radio" name="paymethod" value="COD" checked="checked"> COD
					<input type="radio" name="paymethod" value="Internet Banking"> Internet Banking
					<input type="radio" name="paymethod" value="Debit / Credit card"> Thẻ tín dụng / Thẻ ghi nợ <br /><br />
				</label>
			</div>
			<div class="totals-item">
				<label>Tổng tiền hàng</label>
				<div class="totals-value" id="cart-subtotal"><?php echo $_SESSION['tp'] = "$totalprice"; ?></div>
			</div>
			<div class="totals-item">
				<label>Phí vận chuyển</label>
				<div class="totals-value" id="cart-shipping">15000</div>
			</div>
			<div class="totals-item totals-item-total">
				<label>Tổng thanh toán</label>
				<div class="totals-value" id="cart-total"><?php echo $_SESSION['tp'] = "$totalprice" + "$shipcost"; ?></div>
			</div>
		</div>
		<button type="submit" name="ordersubmit" class="checkout">Thanh toán</button>
	<?php } else {
				echo "Giỏ hàng của bạn đang trống";
			} ?>
	</div>
	</form>
	</div>
</body>

</html>