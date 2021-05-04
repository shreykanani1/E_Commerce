<?php //SK
session_start();
extract($_POST);
    include_once('connection.inc.php');
    $sql1 = "SELECT * FROM users WHERE email='$email' or mobile='$mobile'";
    $result1= mysqli_query($con,$sql1);
    
    if (mysqli_num_rows($result1)>0) 
    {
        $_SESSION['msg']="User Already Exist.";
        header("Location: login.php");
        die();
    } 
    else 
    {
        $sql = "INSERT INTO users (name, email, mobile, password, added_on) VALUES ('$name', '$email','$mobile', '$password',NOW())";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            $_SESSION['msg'] = "Sign up successful. Please Login Once.";
            header("Location: login.php");
        } 
        else 
        {
            $_SESSION['msg'] = "Something went wrong.";
            header("Location: login.php");
        }
    }
    
?>