<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['msg']);
header('location:index.php');
die();
?>