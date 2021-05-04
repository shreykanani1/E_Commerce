<?php

    extract($_GET);
    include_once('connection.inc.php');
    $order_status=$_GET['order_status'];
    $id=get_safe_value($con,$_GET['id']);
        $order_status_sql="UPDATE `order_master` SET `order_status` = '$order_status' WHERE id='$id'";
        mysqli_query($con,$order_status_sql);
//    die($sql);
    header("Location: order_master.php")
?>