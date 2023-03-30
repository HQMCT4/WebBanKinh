<?php
include('../../Connect/config.php');

extract($_POST);
if (isset($save)) {

    $inputData = [
        'HoTen'   => validate($HoTen) ?? "",
        'TaiKhoan'    => validate($TaiKhoan) ?? "",
        'MatKhau'   => validate($MatKhau) ?? "",
        'Email'  => validate($Email) ?? "",
        'DiaChiKH'     => validate($DiaChiKH) ?? "",
        'SoDienThoaiKH'     => validate($SoDienThoaiKH) ?? ""
    ];

    $tableName = "ttkhachhang";
    $db = $conn;
    $result = insert_data($db, $tableName, $inputData);
}

function insert_data($db, $tableName, $inputData)
{
    $data = implode(" ", $inputData);
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } elseif (trim($data) == "") {
        $msg = "Empty Data not allowed to insert";
    } else {

        $query  = "INSERT INTO " . $tableName . " (";
        $query .= implode(",", array_keys($inputData)) . ') VALUES (';
        $query .= "'" . implode("','", array_values($inputData)) . "')";
        $execute = $db->query($query);
        if ($execute === true) {
            $msg = "Đăng ký thành công";
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}

function validate($value)
{
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
