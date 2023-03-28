<?php
session_start();
$TaiKhoan= $_SESSION['DangNhap'];
if(empty($TaiKhoan))
{
  header("location:../User/DangNhap.php");
}
?>
<?php include('../include/funtions.php') ?>
<?php include_once("../include/header.php") ?>
<!-- het header -->
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

<h2 style="padding-left:775px">Sản Phẩm Mới HQM</h2>
<?php
if (is_array($fetchData)) {
    foreach ($fetchData as $data) {
?>
        <div class='signature'>
                <div class='product'>
                <h4 class='productName'><?php echo $data['TenKinh'] ?? ''; ?></h4>
                <img class='productImg' src='../../img/<?php echo $data['AnhBia'] ?? ''; ?>' width='250'>
                <p class='productPrice '><?php echo $data['GiaBan'] ?? ''; ?> VNĐ</p>
                <a href='chitiet.php?detail=<?php echo $data['MaKinh'] ?? ''; ?>' class='productDetail '>Chi tiết</a> 
                </div>
            </div>
    <?php
    }
} else { ?>
    <tr>
        <td colspan="8">
            <?php echo $fetchData; ?>
        </td>
    <tr>
    <?php
} ?>

    <div class="clear"></div>
    <div class="gocHQM">
        <div class="title">
            <span>Góc HQM</span>
        </div>
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="content">
                        <a href="https://kinhmatlily.com/kien-thuc/nen-chon-mua-kinh-ram-nhu-the-nao-de-an-toan-va-chat-luong-n104" target="_blank">
                            <img src="../../img/link1.png"><br>
                            <h2>Nên chọn mua kính râm như thế nào để an toàn và chất lượng?</h2>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content">
                        <a href="https://kinhmatlily.com/kien-thuc/kinh-mat-meo-phu-hop-voi-nhung-khuon-mat-nao-n645" target="_blank">
                            <img src="../../img/link2.png"><br>
                            <h2>Kính mắt mèo phù hợp với những khuôn mặt nào?</h2>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content">
                        <a href="https://kinhmatlily.com/suc-khoe/an-gi-tot-cho-mat-bi-can-cung-lily-giai-dap-ngay-n644" target="_blank">
                            <img src="../../img/link3.png"><br>
                            <h2>Ăn gì tốt cho mắt bị cận?</h2>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content">
                        <a href="https://kinhmatlily.com/bao-ve-mat/can-thi-la-gi-cac-phuong-phap-dieu-tri-can-thi-ma-ban-nen-biet-n103" target="_blank">
                            <img src="../../img/link4.png"><br>
                            <h2>Cận thị là gì? Các phương pháp điều trị cận thị mà bạn nên biết!</h2>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content">
                        <a href="https://kinhmatlily.com/bao-ve-mat/loan-thi-la-gi-nguyen-nhan-va-cach-khac-phuc-loan-thi-n647" target="_blank">
                            <img src="../../img/link5.png"><br>
                            <h2>Loạn thị là gì? Nguyên nhân và cách khắc phục loạn thị</h2>
                        </a>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <!-- Swiper Script -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="../../js/Swiper.js"></script>

    <div class="chonKinh">
        <h2>Bạn có biết đeo loại kính nào sẽ giúp gương mặt của bạn đẹp hơn?</h2>
        <img src="../../img/chonkinh.png" alt="">
    </div>


    <!-- <script>
>>>>>>> a665e8ba2566fd877f882aae4a6e1cd5e9920a67
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            document.getElementById("linkzalo").href = "https://zalo.me/0349967352";
        }

        </script> -->

        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper('.swiper', {
                // Optional parameters
                slidesPerView: 3,
                direction: getDirection(),
                loop: true,

                // // If we need pagination
                // pagination: {
                //     el: '.swiper-pagination',
                // },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // // And if we need scrollbar
                // scrollbar: {
                //     el: '.swiper-scrollbar',
                // },
            });

            function getDirection() {
                var windowWidth = window.innerWidth;
                var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

                return direction;
            }
        </script>
<?php include_once("../include/footer.php");?>
