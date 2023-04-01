<?php
include('../../Connect/config.php');


$db = $conn;
$tableName = "kinh";
$columns = ['MaKinh', 'MaLoaiKinh', 'MaHSX', 'TenKinh', 'GiaBan', 'MoTa', 'AnhBia', 'NgayCapNhat', 'SoluongTon'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {

        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY MaKinh ASC LIMIT 8";
        $result = $db->query($query);

        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}


function spmoi()
{
    global $conn;
    $sql = "SELECT * FROM kinh ORDER BY MaKinh ASC LIMIT 8";
    $rs = mysqli_query($conn, $sql);
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

// sản phâm nam
function spnam()
{
    global $conn;
    $sql = "SELECT * FROM kinh WHERE MaLoaiKinh = 2 ORDER BY MaKinh ASC LIMIT 8";
    $rs = mysqli_query($conn, $sql);
    while ($row_data = mysqli_fetch_assoc($rs)) {

        $MaKinh = $row_data['MaKinh'];
        $MaLoaiKinh = $row_data['MaLoaiKinh'];
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

// sản phẩm nữ
function spnu()
{
    global $conn;
    $sql = "SELECT * FROM kinh WHERE MaLoaiKinh = 1 ORDER BY MaKinh ASC LIMIT 8";
    $rs = mysqli_query($conn, $sql);
    while ($row_data = mysqli_fetch_assoc($rs)) {

        $MaKinh = $row_data['MaKinh'];
        $MaLoaiKinh = $row_data['MaLoaiKinh'];
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

// sản phẩm trẻ em
function sptreem()
{
    global $conn;
    $sql = "SELECT * FROM kinh WHERE MaLoaiKinh = 3 ORDER BY MaKinh ASC LIMIT 8";
    $rs = mysqli_query($conn, $sql);
    while ($row_data = mysqli_fetch_assoc($rs)) {

        $MaKinh = $row_data['MaKinh'];
        $MaLoaiKinh = $row_data['MaLoaiKinh'];
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