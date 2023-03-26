<?php
    include('../../Conect/config.php');
    function spmoi(){
        global $con;
        $sql = "SELECT * FROM kinh ORDER BY MaKinh ASC LIMIT 8";
        $rs = mysqli_query($con, $sql);
        while ($row_data = mysqli_fetch_assoc($rs)) {
            $MaKinh = $row_data['MaKinh'];
            $TenKinh = $row_data['TenKinh'];
            $AnhBia = $row_data['AnhBia'];
            $GiaBan = $row_data['GiaBan'];
            // $idhsx = $row_data['idHSX'];
            // $noidung = $row_data['NoiDung'];
            // $idlsp = $row_data['idLSP'];
            
            echo 
            "<div class='signature'>
                <div class='product'>
                <h4 class='productName'>$TenKinh</h4>
                <img class='productImg' src='../../img/$AnhBia' width='250'>
                <p class='productPrice '>$GiaBan VNĐ</p>
                <a href=' ' class='productDetail '>Chi tiết</a> 
                </div>
            </div>";
        }
    }
?>












