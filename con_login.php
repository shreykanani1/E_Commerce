<?php //SK
    session_start();
    extract($_POST);
    include_once('connection.inc.php');
    $sql = "SELECT * from users WHERE email='$email' and password='$password'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row)
    {
        // if(isset($_POST['RememberMe']))
        // {
        //     setcookie("un", $_POST['username']);
        // } 
        $_SESSION['msg'] = $_POST['name'];
        $_SESSION['id']=$row['id'];
        
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['LOGIN_SUCCESS'] = $_POST['email'];
        // $_SESSION['ui'] = $row['UserID'];
        header("Location: index.php");
    }
    else
    {
        $_SESSION['msg']="username/password does not match.";
        header("Location: login.php");
        die();
    }
?>