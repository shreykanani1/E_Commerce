<?php //SK

    extract($_GET);
    require("connection.inc.php");
    include_once('connection.inc.php');
    $_SESSION['total']=$total + ($qty*$price);
    // echo ($_SESSION['total']);
    header("location: add_to_cart.php");
?>