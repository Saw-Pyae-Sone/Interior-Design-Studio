<?php
session_start();
unset( $_SESSION['C_ID']);
unset($_SESSION['cart']);
echo "<script>alert('Successfully Signed Out');window.open('../Home/index.php','_self');</script>";
?>