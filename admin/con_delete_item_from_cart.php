<?php
    session_start();
    extract($_GET);
    include_once('connection.inc.php');
    $sql= "DELETE FROM friends where FriendID='$id'";
    $result = mysqli_query($con, $sql);
//    die($sql);
    if ($con) 
    {
        $_SESSION['insert_msg'] = "Delete successful";
    
        header("Location: list_friends.php");
    } 
    else 
    {
        $_SESSION['insert_msg'] = "There is some problem.";
        header("Location: list_friends.php");
    }
?>