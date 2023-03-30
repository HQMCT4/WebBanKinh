<?php
session_start();
include("../../Connect/config.php");
$_SESSION['login']=="";
session_unset();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="dangnhap.php";
</script>