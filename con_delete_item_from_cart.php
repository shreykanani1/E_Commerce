<?php
    session_start();
    extract($_GET);
    $user_id=$_SESSION['id'];
    
    include_once('connection.inc.php');
    $sql= "DELETE FROM cart where id=$id";
    echo($sql);
    $result = mysqli_query($con, $sql);
   
    if ($con) 
    {
        header("Location: add_to_cart.php");
    } 
    else 
    {
        $_SESSION['delete_msg'] = "There is some problem.";
        header("Location: add_to_cart.php");
    }
?>